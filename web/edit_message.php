<?php
include_once '../models/Database.php';
include_once '../models/Message.php';

$db = new Database();
$message = new Message($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $messageInfo = $message->getMessageById($id);
    echo '<pre>';
    print_r($messageInfo);
    echo '</pre>';
}

?>


<head>
    <title>Форма редактирования сообщения</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/message.css">
</head>
<body>
<div class="register">
    <div class="register__wrapper">
        <h2 class="register__title">Редактирование сообщения</h2>
        <form class="form-register" id="register" name="register" action="edit.php"
              method="POST">
            <input name="id" value="<?php echo $messageInfo['id']; ?>" hidden="hidden">
            <input name="title" placeholder="Введите название" type="text" value="<?php echo $messageInfo['title']; ?>" required>
            <input name="author" placeholder="Введите имя" type="text" value="<?php echo $messageInfo['author']; ?>" required>
            <textarea name="short_content" placeholder="Введите краткое содержание" required><?php echo $messageInfo['short_content']; ?></textarea>
            <textarea name="full_content" placeholder="Введите полное содержание" required><?php echo $messageInfo['full_content']; ?></textarea>
            <input type="submit" name="edit_message" value="Отправить">
        </form>
    </div>
</div>
</body>



