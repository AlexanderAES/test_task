<?php
include_once '../models/Database.php';
include_once '../models/Message.php';

$db = new Database();
$message = new Message($db);
$allMessages = $message->readAll();

$perPage = 3;
$totalItems = count($allMessages);
$totalPages = ceil($totalItems / $perPage);
$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($currentPage - 1) * $perPage;
$messageToShow = array_slice($allMessages, $offset, $perPage);
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
            <?php foreach ($messageToShow as $message) { ?>
                <div class="message">
                    <h3 class="message__title"><?= $message['title']; ?></h3>
                    <p class="message__subtitle"><?= $message['short_content']; ?></p>
                    <a class="message__button" href="view_message.php?id=<?= $message['id']; ?>">Полный просмотр</a>
                </div>
            <?php } ?>
        </div>
        <?php echo "<div class='pagination'>";
        for ($page = 1; $page <= $totalPages; $page++) {
            echo "<a href='?page=$page'>$page</a> ";
        }
        echo "</div>"; ?>
    </div>
</div>
</body>
</html>
