<?php
    // namespace settings\main;

    use Jajo\JSONDB;

    //Константы и глобальные переменные
    const DB_PATH = 'assets/database/'; //Путь к папке базы данных
    const TABLE  = 'settings.json'; //Название файла с данными
    
    //Настройки по умолчанию (используются, если файла с настройками нет, или если в загруженных данных отсутствует опция)
    $default_settings = [
        'outbound_email' => 'example_out@mail.ru', //Адрес исходящей почты
        'inbound_email' => 'example_in@mail.ru', //Адрес входящей почты
        'username' => 'username', //Имя пользователя в почтовом ящике
        'password' => 'password', //Пароль от почты
        'use_SMTP' => true, //Использование SMTP
        'SMTP_host' => 'smtp.yandex.ru', //Хост SMTP
        'SMTP_port' => '465', //Порт SMTP
        'subject' => 'Новая заявка!',
    ];

    $settings = null;

    if(!file_exists(DB_PATH.TABLE))
        $settings = $default_settings;
    else
        $settings = array_merge( $default_settings, json_decode(file_get_contents(DB_PATH.TABLE), true) ); //Слияние используется, чтобы, если нет сохранённых настроек, брать значения по умолчанию

    //Функции
    function settings_save(array $settings){ //Сохранить настройки
        file_put_contents(DB_PATH.TABLE, json_encode($settings, JSON_PRETTY_PRINT));
    } //settings_save
?>