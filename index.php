<?php

const errorMail = 'dafaqtx@gmail.com'; // константа почты, куда отправляются письма об ошибке

require_once('getMessage.php'); // получаем обычное сообщение

require_once('xor.php'); // приходит переменная $ciper с зшифрованным сообщением

$stop       = false; // условие выполнения цикла
$repeatTime = 3600; // время повторного выполнения цикла в секундах (1 час = 3600 секунд)
while (!$stop) {
    
    // обращение с нужными парметрами
    if ($curl = curl_init()) { // инициализация сеанса
        curl_setopt($curl, CURLOPT_URL, 'https://syn.su/testwork.php'); // куда запрос
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, true); // POST запрос
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'method=update&message=' . $cipher); // парметры запроса с зашифрованным сообщением
        curl_setopt($curl, CURLOPT_HEADER, 0);
        $result = curl_exec($curl); // выполнение запроса
        curl_close($curl); // закрытие сеанса
        
        // проверяем ответ, если он не совпадает с нужным, то останавливаем цикл и отправляем письмо с ошибкой
        if ($result !== '{"errorCode":null,"response":"Success"}') {
            global $stop;
            $stop = true; // меняем значение переменной для остановки цикла
            mail(errorMail, 'Demon Error', '<h1>The program has stopped</h1>' . ' ' . date('Y/m/j G:i:s'));
        }
        
    }
    
    sleep($repeatTime);
}


?>