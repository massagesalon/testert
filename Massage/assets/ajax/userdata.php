<?php
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    if ($name == '' || $email == '' || $message == ''){
        echo 'Заповніть всі поля';
        exit;
    }

    $subject = "=?utf-8?B?".base64_encode("Повідомлення з сайту")."?=";
    $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

    if(mail("sizon.artem@kmrf.kiev.ua", $subject, $message, $headers))
        echo "Повідомлення надіслано";
    else
        echo "Повідомлення не надіслано";
?>