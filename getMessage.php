<?php

// получение данных
if ($curl = curl_init()) { // инициализация сеанса
    curl_setopt($curl, CURLOPT_URL, 'https://syn.su/testwork.php'); // куда запрос
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, true); // POST запрос
    curl_setopt($curl, CURLOPT_POSTFIELDS, 'method=get'); // парметры запроса
    curl_setopt($curl, CURLOPT_HEADER, 0);
    $result = curl_exec($curl); // выполнение запроса
    curl_close($curl); // закрытие сеанса
}
$jsonResult = json_decode($result); // парсим JSON ответ в php массив
$response   = $jsonResult->response; // берем ответ
$message    = $response->message; // берем сообщение из ответа
$key        = $response->key; // берем ключ из ответа

?>