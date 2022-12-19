<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    use wcms\classes\log\Log;

    $mail = new PHPMailer(true);

    try {
        echo "Отправка почты...<br>";
        //Настройка
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        
        //TODO Заглушка по умолчанию. Удалить после создания настроек
        if($settings['use_SMTP']){
            $mail->isSMTP();
            $mail->Host = $settings['SMTP_host'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth   = true;
            $mail->Username   = $settings['username'];
            $mail->Password   = $settings['password'];
            $mail->Port       = $settings['SMTP_port'];
        }
        else
            $mail->isMail(); //Необходимо установить пакеты php-mail, postfix        

        $mail->CharSet = 'UTF-8';
    
        //Инфомрация о получателе
        $mail->setFrom($settings['outbound_email']);
        $mail->addAddress($settings['inbound_email']);
    
        //Тело письма
        $mail->isHTML(true);
        $mail->Subject = $settings['subject'];
        $mail->Body = implode('<br>', [
            isset($lead->name) ? 'Имя: '.$lead->name : '',
            isset($lead->phone) ? 'Телефон: '.$lead->phone : '',
            isset($lead->email) ? 'E-mail: '.$lead->email : '',
            isset($lead->city) ? 'Город: '.$lead->city : '',
            isset($lead->cost) ? 'Сумма: '.$lead->cost : '',
        ]);
    
        $mail->send();
    } catch (Exception $e) {
        Log::record("Ошибка отправки сообщения: {$mail->ErrorInfo}");
        header('Location:../thanks/index.html');
        ob_end_flush();
    }
?>