<head>
    <title>Форма комментария</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/message.css">
</head>
<body>
<div class="register">
    <div class="register__wrapper">
        <h2 class="register__title">Введите комментарий</h2>
        <form class="form-register" id="register" name="register" action="save_comment.php"
              method="POST">
            <input name="id" value="<?=$_GET['id']?>" hidden="hidden">
            <input name="author" placeholder="Введите ваше имя" type="text" required>
            <textarea name="content" placeholder="Введите комментарий" cols="65" rows="6"
                      required></textarea>

            <input type="submit" name="add_comment" value="Отправить">
        </form>
    </div>
</div>
</body>



