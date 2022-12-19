<?php
    ob_start();
    use \wcms\classes\lead\Lead;
    use \wcms\classes\log\Log;

    if(array_key_exists('id', $_GET)){ //Выполнять, только если в GET-запросе есть ключ id
        require 'core/initialize.php';
        $user = new wcms\classes\auth\Login;
        $user->require_login();

        $lead = Lead::find($_GET['id']);
        if($lead){
            Lead::destroy($_GET['id']);
            Log::create("Был удалён лид: {$lead->name}, {$lead->phone}");
        }
    }
    header('Location:leads.php'); //Перенаправление на главную страницу
    ob_end_flush();
    
?>