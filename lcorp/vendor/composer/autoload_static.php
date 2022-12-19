<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita6688f883841141a05cb6e4c49bce6b5
{
    public static $files = array (
        'b1dd4e332496ee9d8933dc654076e9a5' => __DIR__ . '/..' . '/jajo/jsondb/helpers/dataTypes.php',
        'ac0c476eaaca2c96072228f64c624fb0' => __DIR__ . '/..' . '/jajo/jsondb/helpers/json.php',
        '125d20deee7f32748b8caee14d95694e' => __DIR__ . '/../..' . '/core/defines.php',
        'ab6852fde346c1e2a8840d8d5c6a9de1' => __DIR__ . '/../..' . '/core/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wcms\\' => 5,
        ),
        'U' => 
        array (
            'Ufee\\Sqlite3\\' => 13,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'J' => 
        array (
            'Jajo\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wcms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'Ufee\\Sqlite3\\' => 
        array (
            0 => __DIR__ . '/..' . '/ufee/sqlite3/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Jajo\\' => 
        array (
            0 => __DIR__ . '/..' . '/jajo/jsondb/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita6688f883841141a05cb6e4c49bce6b5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita6688f883841141a05cb6e4c49bce6b5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita6688f883841141a05cb6e4c49bce6b5::$classMap;

        }, null, ClassLoader::class);
    }
}