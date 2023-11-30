<head>
    <title>Форма комментария</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="libs/css/style.css">
</head>
<body>
<div class="messages">
    <div class="messages__wrapper">
        <h2 class="messages__title">Введите комментарий</h2>
        <form class="form-message" id="message" name="message" action="save_comment.php"
              method="POST">
            <input name="id" value="<?=$_GET['id']?>" hidden="hidden">
            <input name="author" placeholder="Введите ваше имя" type="text" required>
            <textarea name="content" placeholder="Введите комментарий" cols="65" rows="6"
                      required></textarea>

            <input type="submit" name="add_comment" value="Отправить">
        </form>
        <div class="back__button">
            <a href="view_message.php?id=<?=$_GET['id']?>">Назад</a>
        </div>
    </div>
</div>
</body>



