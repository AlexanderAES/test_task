<?php

include_once '../models/Database.php';
include_once '../models/Message.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $message = new Message($db, $_POST['title'], $_POST['author'], $_POST['short_content'], $_POST['full_content']);
    if ($message->save()) {
        echo "Сообщение успешно сохранено в базе данных.";
    } else {
        echo "Ошибка сохранения сообщения.";
    }
}

