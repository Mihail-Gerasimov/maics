<?php
    ob_start();
    require 'core/initialize.php';

    use wcms\classes\log\Log;

    if(count($_POST)){
        if(!array_key_exists('use_SMTP', $_POST))
            $_POST['use_SMTP'] = 0;
        $settings = array_merge($settings, $_POST);
        settings_save($settings);
    }

    header('Location: settings-mail.php');
    ob_end_flush();
?>