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

    echo '<pre>';
    print_r($comments);
    echo '</pre>';
}
?>

<head>
    <title>Просмотр сообщения</title>
</head>
<body>
<h1>Просмотр сообщения</h1>
<div>
    <a href="send_message.php">
        <button>Добавить новое сообщение</button>
    </a>
</div>
<div>
    <div>
        <h3><?= $messageInfo['title']; ?></h3>
        <p><?= $messageInfo['author']; ?></p>
        <p><?= $messageInfo['short_content']; ?></p>
        <p><?= $messageInfo['full_content']; ?></p>
    </div>
    <hr>
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
        <a href="edit_message.php?id=<?= $messageInfo['id']; ?>">Редактировать сообщение</a>
    </div>
    <div>
        <a href="add_comment.php?id=<?php echo $messageInfo['id']; ?>">Добавить комментарий</a>
    </div>
</div>
</body>
