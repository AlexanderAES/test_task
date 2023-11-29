<head>
    <title>Форма ввода сообщения</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/messages.css">
</head>
<body>
<div class="messages">
    <div class="messages__wrapper">
        <h2 class="messages__title">Введите ваше сообщение</h2>
        <form class="form-message" id="register" name="register" action="add_message.php"
              method="POST">
            <input id="title" name="title" placeholder="Введите название" type="text" required>
            <input id="author" name="author" placeholder="Введите имя" type="text" required>
            <textarea id="short_content" name="short_content" placeholder="Введите краткое содержание" cols="65" rows="6"
                      required></textarea>
            <textarea id="full_content" name="full_content" placeholder="Введите полное содержание" cols="65" rows="6"
                      required></textarea>
            <input type="submit" value="Отправить">
        </form>
    </div>
</div>
</body>



