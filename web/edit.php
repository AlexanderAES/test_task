<?php
include_once '../models/Database.php';
include_once '../models/Message.php';

$db = new Database();
$message = new Message($db);


if (isset($_POST['edit_message'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $short_content = $_POST['short_content'];
    $full_content = $_POST['full_content'];

    $update = $message->update($id, $title, $author, $short_content, $full_content);
    if ($update) {
        echo "Сообщение успешно сохранено в базе данных.";
    } else {
        echo "Ошибка сохранения сообщения.";
    }
}

