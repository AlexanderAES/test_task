<?php
include_once '../models/Database.php';
include_once '../models/Message.php';
include_once '../models/Comment.php';

$db = new Database();
$message = new Message($db);
$comment = new Comment($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $messageInfo = $message->getMessageById($id);
    $comments = $comment->getAllCommentsByMessageId($id);
}
?>
<head>
    <title>Просмотр сообщения</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/messages.css">
</head>
<body>
    <div class="messages">
        <div class="messages__block">
            <h1 class="messages__title">Просмотр сообщения</h1>
            <a class="messages__add" href="send_message.php">Добавить новое сообщение</a>
            <div class="messages__wrapper">
                <div class="message">
                    <h3 class="message__title"><?= $messageInfo['title']; ?></h3>
                    <p class="message__subtitle"><?= $messageInfo['author']; ?></p>
                    <p class="message__text"><?= $messageInfo['short_content']; ?></p>
                    <p class="message__text"><?= $messageInfo['full_content']; ?></p>
                </div>
            </div>
            <div>
                <?php foreach ($comments as $item): ?>

                    <div>
                        <h3><?= $item['author']; ?></h3>
                        <p><?= $item['text']; ?></p>

                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
            <div>
                <a class="messages__add" href="edit_message.php?id=<?= $messageInfo['id']; ?>">Редактировать сообщение</a>
            </div>
            <div>
                <a class="messages__add" href="add_comment.php?id=<?php echo $messageInfo['id']; ?>">Добавить комментарий</a>
            </div>
            <div class="back__button">
                <a href="index.php">К списку сообщений</a>
            </div>
        </div>
    </div>
</body>