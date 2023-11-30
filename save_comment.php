<?php

include_once 'models/Database.php';
include_once 'models/Message.php';
include_once 'models/Comment.php';


if (isset($_POST['add_comment'])) {

    $id = $_POST['id'];
    $db = new Database();

    $comment = new Comment($db, $id, $_POST['author'], $_POST['content']);
    if ($comment->save()) {
        echo "Комментарий успешно сохранен в базе данных.";
    } else {
        echo "Ошибка сохранения комментария.";
    }
}




