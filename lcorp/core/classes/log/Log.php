<?php
    namespace wcms\classes\log;

    use wcms\classes\model\Model;
    use Jajo\JSONDB;

    class Log extends Model{
        protected $table = 'log.json';
        protected $fillable = ['id', 'created_at', 'text'];

        protected $max = 100;

        static public function record(string $text){ //Обёртка для удобного добавления записей в лог
            return self::create(['text' => $text]);
        } //record
    };
?>