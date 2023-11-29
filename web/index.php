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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/messages.css">
</head>
<body>
    <div class="messages">
        <div class="messages__block">
            <h1 class="messages__title">Список сообщений</h1>
            <a class="messages__add" href="send_message.php">Добавить новое сообщение</a>
            <div class="messages__wrapper">
                <?php foreach ($allMessages as $message) { ?>
                    <div class="message">
                        <h3 class="message__title"><?= $message['title']; ?></h3>
                        <p class="message__subtitle"><?= $message['short_content']; ?></p>
                        <a class="message__button" href="view_message.php?id=<?= $message['id']; ?>">Полный просмотр</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
