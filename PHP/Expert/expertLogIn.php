<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../../SVG/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../CSS/root.css">
    <link rel="stylesheet" href="../../CSS/expertLogIn.css">
    <script src="../../JS/JQuery.js"></script>
    <title>Вход для эксперта</title>
</head>
<body>
<button type="button" id="indexBtn" onclick="window.location.href='../../index.php'">На главную</button>
<form id="expertForm" method="post" action="expertLog.php">
    <div class="card" id="formCard">
        <h3>Добрый день!</h3>
        <h4>Введите данные эксперта для просмотра результатов.</h4>
        <div class="formElement">
            <input type="text" placeholder=" " id="login" name="login" required>
            <label for="login">Логин</label>
        </div>
        <div class="formElement">
            <input type="password" placeholder=" " id="password" name="password" required>
            <label for="password">Пароль</label>
        </div>
        <div class="formElement">
            <input type="password" placeholder=" " id="expertCode" name="expertCode" required>
            <label for="expertCode">Код</label>

        </div>
        <button id="expertLogBtn" type="submit">Войти</button>
    </div>
    <div class="overlay">
        <div class="modal">
            <button type="button" class="close" id="closeModal">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="1" width="36" height="36" rx="7" stroke="#3B2447" stroke-width="2"/>
                    <path d="M28.0986 9.90332L9.36621 28.6357" stroke="#3B2447" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.36621 9.90332L28.0986 28.6357" stroke="#3B2447" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <h3>Пожалуйста, заполните все поля!</h3></div>
    </div>
</form>
</body>
<script>
    let login = $('#login'),
        password = $('#password'),
        code = $('#expertCode');
    $('#expertLogBtn').click(function () {
        if (login.val() != '' && password.val() != '' && code.val() != '' ) {
            $("#formCard").fadeOut(1000);
            $("#instructionsCard").fadeIn(1000);
        } else {
            $(".overlay").css("display", "block");
        }
        $("#closeModal").click(function (){
            $(".overlay").css("display", "none");
        })
    })
</script>
</html>
