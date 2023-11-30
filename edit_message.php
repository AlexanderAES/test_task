<?php
include_once 'models/Database.php';
include_once 'models/Message.php';

$db = new Database();
$message = new Message($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $messageInfo = $message->getMessageById($id);
}

?>


<head>
    <title>Форма редактирования сообщения</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="libs/css/style.css">
</head>
<body>
<div class="messages">
    <div class="messages__wrapper">
        <h2 class="messages__title">Редактирование сообщения</h2>
        <form class="form-message" id="message" name="message" action="edit.php"
              method="POST">
            <input name="id" value="<?= $messageInfo['id']; ?>" hidden="hidden">
            <input name="title" placeholder="Введите название" type="text" value="<?= $messageInfo['title']; ?>" required>
            <input name="author" placeholder="Введите имя" type="text" value="<?= $messageInfo['author']; ?>" required>
            <textarea name="short_content" placeholder="Введите краткое содержание" cols="65" rows="6" required><?= $messageInfo['short_content']; ?></textarea>
            <textarea name="full_content" placeholder="Введите полное содержание" cols="65" rows="6" required><?= $messageInfo['full_content']; ?></textarea>
            <input type="submit" name="edit_message" value="Сохранить">
        </form>
        <div class="back__button">
            <a href="view_message.php?id=<?=$_GET['id']?>">Назад</a>
        </div>
    </div>

</div>
</body>




