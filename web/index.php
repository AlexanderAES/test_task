<?php
include_once '../models/Database.php';
include_once '../models/Message.php';

$db = new Database();
$message = new Message($db);
$allMessages = $message->readAll();

echo '<pre>'; print_r($allMessages); echo '</pre>'

?>

<!DOCTYPE html>
<html>
<head>
    <title>Просмотр сообщений</title>
</head>
<body>
<h1>Список сообщений</h1>
<div>
    <a href="send_message.php">
        <button>Добавить новое сообщение</button>
    </a>
</div>
<hr>
<div class="messages">
    <?php foreach ($allMessages as $message) { ?>
        <div class="message">
            <h3><?= $message['title']; ?></h3>
            <p><?= $message['short_content']; ?></p>
            <a href="view_message.php?id=<?= $message['id']; ?>">Полный просмотр</a>
            <hr>
        </div>
    <?php } ?>
</div>
</body>
</html>
