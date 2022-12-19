<?php
    ob_start();
    require 'core/initialize.php';
    
    use wcms\classes\lead\Lead;
    use wcms\classes\log\Log;

    if(count($_POST)){
        // Добавление лида в базу
        $lead = Lead::create(array_merge($_POST));

        if ($GLOBALS['bitrix_enable']) sendCrmBitrix($lead->name,$lead->phone);
        
        Log::record( "Получен новый лид: " . ($lead->name ?? "(Имя не указано)") . ", " . ($lead->phone ?? "(Телефон не указан)") . ", " . ($lead->email ?? "(E-mail не указан)") );

        //Отправка по e-mail
        include('mailer.php');
        $lead->mailed = 1;
        $lead->save();
        Log::record("Лид: [" . ($lead->name ?? "(Имя не указано)") . ", " . ($lead->phone ?? "(Телефон не указан)") . ", " . ($lead->email ?? "(E-mail не указан)") . "] отправлен на e-mail " . $settings['inbound_email']);

        //Отправка в ЦРМ


        // Переадресация на страницу с благодарностью
        header('Location:../thanks/index.html');
        ob_end_flush();
    }
    else{
        header('Location:../index.html'); //Перенаправление на главную страницу, если кто-то зашёл без запроса
        ob_end_flush();
    }

     function sendCrmBitrix($name, $number)
    {
    
        $queryUrl = $GLOBALS['bitrix_webhook'];
        $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => 'Заявка'.' '.$name,
                "NAME" => $name,
                "STATUS_ID" => "NEW",
                "SOURCE_ID" => '',
                "SOURCE_DESCRIPTION" => "",
                "OPENED" => "Y",
                "PHONE" => [["VALUE" => preg_replace("/[^0-9]/", '', $number), "VALUE_TYPE" => "WORK" ]],
            ),
            'params' => ["REGISTER_SONET_EVENT" => "Y"]
        ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        curl_exec($curl);
        if (curl_errno($curl)) {
            throw new \RuntimeException('Couldn\'t send request: ' . curl_error($curl));
        }

        $resultStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($resultStatus !== 200) {
            throw new \RuntimeException('Request failed: HTTP status code: ' . $resultStatus);
        }
        curl_close($curl);

    }
?>