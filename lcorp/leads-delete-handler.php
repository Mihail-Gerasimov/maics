<?php
ob_start();

use Jajo\JSONDB;
use wcms\classes\lead\Lead;
use wcms\classes\log\Log;

require 'core/initialize.php';
$user = new wcms\classes\auth\Login;
$user->require_login();

if(isset($_GET['id'])){
    $lead = Lead::findOrFail($_GET['id']);
    $info = ['name' => $lead->name, 'phone' => $lead->phone];
    $lead->delete();
    Log::record("Удалён лид №{$lead->id} ({$lead->name}, {$lead->phone})");
}

header('Location:../leads.php'); //Перенаправление на главную страницу, если кто-то зашёл без запроса
ob_end_flush();

?>