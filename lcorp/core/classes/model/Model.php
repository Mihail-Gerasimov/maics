<?php
    namespace wcms\classes\model;

    use Jajo\JSONDB;

    class Model{
        //##############
        //Свойства
        //##############
        protected $database = 'assets/database/'; //Путь к базе данных
        protected $table = false; //Название файла с таблицей

        protected $fields = []; //Поля модели
        protected $fillable = []; //Поля, которые можно указывать в конструкторе и загружать из файла
        protected $readonly = []; //Поля модели, которые нельзя изменять
        protected $hidden = []; //Поля модели, которые будут скрываться при преобразовании в массив или JSON
        protected $default = []; //Значения по умолчанию

        protected $max = 0; //Максимальное количество записей в таблице. Если выставлен 0, количество не ограничено

        //##############
        //Методы
        //##############
            //
            //Магические методы
            //
        public function __construct(array $params){
            foreach($params as $key => $value)
                if(in_array($key, $this->fillable))
                    $this->fields[$key] = $value;

            if(empty($this->table))
                $this->table = $this->generateTableName();
        } //__construct

        public function __set($name, $value){
            if(!(in_array($name, $this->readonly)))
                $this->fields[$name] = $value;
        } //__set

        public function __unset($name){
            //Удалять можно только свойства, не указанные в fillable
            if(!in_array($name, $this->fillable))
                unset($this->fields[$name]);
        } //__unset

        public function __isset($name){
            return isset($this->fields[$name]);
        } //__isset

        public function __get($name){
            return array_key_exists($name, $this->fields)
                    ? $this->fields[$name]
                    : ( array_key_exists($name, $this->default) ? $this->default[$name] : null ); //Если значение не указано, но есть по умолчанию, вернуть его (если нет и такого, вернуть null)
        } //__get

            //
            //Статические методы
            //
        static protected function db(): object{ //Подключение к базе данных
            $static = new static([]);

            //Если файла с данными не существует, создать новый и вставить в него пустую запись (чтобы не было ошибок чтения)
            if(!file_exists($static->database . $static->table))
                file_put_contents($static->database . $static->table, '[]');
            return (object)['connection' => new JSONDB($static->database), 'dbname' => $static->database, 'table' => $static->table];

        } //db

        static public function all(array $order = ['field' => 'id', 'order' => JSONDB::ASC]){ //Загрузка всех записей
            //Подключение к БД и загрузка данных
            $db = static::db();
            $raw = $db->connection->select('*')->from($db->table)->order_by($order['field'], $order['order'])->get();

            //Создание объектов класса Lead из загруженных данных
            $leads = [];
            foreach($raw as $item)
                $leads[] = new static($item);
            return $leads;
        } //all

        static public function loadWhere(array $where, string $operator = JSONDB::OR, array $order = ['field' => 'id', 'order' => JSONDB::ASC]){ //Загрузка записей с условием where
            //Подключение к БД и загрузка данных
            $db = static::db();
            $raw = $db->connection->select('*')->from($db->table)->where($where, $operator)->order_by($order['field'], $order['order'])->get();

            //Создание объектов класса Lead из загруженных данных
            $leads = [];
            foreach($raw as $item)
                $leads[] = new static($item);
            return $leads;
        } //all

        static public function find(int $id): self{ //Загрузка записи по id
            $db = static::db();
            $model = $db->connection->select('*')->from($db->table)->where(['id' => $id])->get();
            return count($model) ? new static(current($model)) : null;
        } //find

        static public function findOrFail(int $id): self{ //Загрузка записи по id. Прекращает работу скрипта, если запись не найдена
            $db = static::db();
            $model = $db->connection->select('*')->from($db->table)->where(['id' => $id])->get();
            if(!count($model)) //TODO Сделать исключение
                throw new \OutOfRangeException("Запись #$id не найдена в таблице {$db->dbname}{$db->table}");
            return new static(current($model));
        } //findOrFail

        static public function create(array $params): self{ //Создание записи
            $db = static::db();
            $static = new static([]);
            $static->checkMax($db);

            //Вычисление последнего id
            $ids = $db->connection->select('id')->from($db->table)->order_by('id', JSONDB::DESC)->get();
            $lastID = count($ids) ? (current($ids)['id'] + 1) : 1;

            $params = array_merge($static->default, $params); //Добавление значений по умолчанию, если таковых нет в params
            foreach($params as $key => $value){ //Отсечение полей, не указанных в fillable (таким образом отсекаются лишние значения из default, которые не указаны в fillable)
                if(!in_array($key, $static->fillable))
                    unset($params[$key]);
            }

            //Запись в файл
            $params = array_merge($params, ['id' => $lastID, 'created_at' => date('d F Y, H:i:s')]);
            $db->connection->insert($db->table, $params);

            return new static($params);
        } //create

        static public function update(array $params, array $where, string $operator = JSONDB::OR){ //Обновить данные в таблице
            $db = static::db();

            $static = new static([]);
            foreach($params as $key => $value) //Отсечение полей, не указанных в fillable
                if(in_array($key, $static->readonly))
                    unset($params[$key]);

            $db->connection->update($params)->from($db->table)->where($where, $operator)->trigger();
        } //update

        static public function destroy($ids){ //Удаление записей по идентификаторам
            if(is_array($ids)){
                if(!count($ids))
                    return;

                $db = static::db();
                foreach($ids as $id)
                    $db->connection->delete()->from($db->table)->where(['id' => $id])->trigger();
            }
            elseif(is_integer($ids)){
                $db = static::db();
                $db->connection->delete()->from($db->table)->where(['id' => $ids])->trigger();
            }
        } //erase

        static public function truncate(){ //Удалить все записи из таблицы
            $db = static::db();
            $db->connection->delete()->from($db->table)->trigger();
        } //truncate

        public static function paginate(int $pos, int $chunk, int $order): object{//Пагинация
            //Загрузка начальных данных
            $leads = static::all(['field' => 'id', 'order' => $order]);
            $total = count($leads);

            //Валидация входящих параметров (для избежания ошибок при пагинации)
            if($pos < 0) $pos = 0;
            if($pos > $total) $pos = ceil($total/$chunk)*$chunk  - $chunk;

            //Извлечение нужного куска данных
            $leads = array_slice($leads, $pos, $chunk);

            //Создание url для ссылок
            $urls = [];
            $urls['prev'] = $pos > 0 ? ( parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?pos=' . ($pos - $chunk > 1 ? $pos - $chunk : 0) ) : "";
            $urls['next'] = $pos < $total ? ($pos + $chunk < $total ? (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?pos='.$pos .  $chunk) : "") : "";
            $urls['first'] = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?pos=0';
            $urls['last'] = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) . '?pos='.( ceil($total/$chunk)*$chunk  - $chunk);
            $urls['current'] = ceil($pos/$chunk + 1);

            //Упаковка "быстрых" ссылок для вывода их одной командой
            $links = implode(' ',
            [
                "<a href=\"{$urls['first']}\"> << </a>",
                "<a href=\"{$urls['prev']}\"> < </a>",
                "<strong>{$urls['current']}</strong>",
                "<a href=\"{$urls['next']}\"> > </a>",
                "<a href=\"{$urls['last']}\"> >> </a>",
            ]);

            return (object)[
                'data' => $leads,
                'urls' => $urls,
                'links' => $links,
            ];
        } //paginate

            //
            //Прочие методы
            //
        protected function generateTableName(): string{
            $src = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', (new \ReflectionClass($this))->getShortName()));
            switch(substr($src, -1, 1)){
                case 's':
                    return $src . 'es' . '.json';
                case 'y':
                    return substr_replace($src, 'ies', -1);
                default:
                    return $src . 's' . '.json';
            }
        } //Сгенерировать название таблицы

        public function save(){ //Сохранить изменения в модели
            $db = static::db();

            //Добавление значений по умолчанию, если таковых нет в params
            $params = array_merge($this->default, $this->fields);

            //Отсечение полей, не указанных в fillable (таким образом отсекаются лишние значения из default, которые не указаны в fillable)
            foreach($params as $key => $value)
                if(!in_array($key, $this->fillable))
                    unset($params[$key]);

            //Проверка существования модели в БД
            if(!isset($this->id)){ //Если такая модель отсутствует в БД (имеется ID), создать её
                //Добавление идентификатора и даты создания
                $ids = $db->connection->select('id')->from($db->table)->order_by('id', JSONDB::DESC)->get();
                $this->id = $params['id'] = count($ids) ? (current($ids)['id'] + 1) : 1;
                $this->created_at = $params['created_at'] = date('d F Y, H:i:s');
                $db->connection->insert($db->table, $params);
            }
            else
                $db->connection->update($params)->from($db->table)->where(['id' => $this->id])->trigger();
        } //save

        public function delete(){ //Удалить модель из базы данных
            $db = static::db();
            $db->connection->delete()->from($this->table)->where(['id' => $this->id ?? ''])->trigger();
        } //delete

        public function checkMax($db){ //Проверить ограничение по количеству записей и удалить старые
            if($this->max == 0) return; //Если указан 0, ограничение не действует

            $entries = $db->connection->select('*')->from($db->table)->get();
            $total = count($entries);
            if($total < $this->max) return;

            //Удаление старых записей
            $forDelete = array_slice($entries, 0, $total - $this->max + 1);

            foreach($forDelete as $entry)
                $db->connection->delete()->from($db->table)->where($entry, JSONDB::AND)->trigger();

        } //checkMax

        public function toArray(bool $hide = true){ //Преобразовать в массив и при необходимости спрятать указанные поля
            return array_diff_key(
                array_merge($this->default, $this->fields), $hide ? array_flip($this->hidden) : []
            );
        } //toArray

        public function toJSON(bool $hide = true){ //Преобразовать в JSON и при необходимости спрятать указанные поля
            return json_encode(
                array_diff_key(
                    array_merge($this->default, $this->fields), $hide ? array_flip($this->hidden) : []
                )
            );
        } //toJSON
    };
?>
