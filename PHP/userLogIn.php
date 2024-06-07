<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../SVG/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/root.css">
    <link rel="stylesheet" href="../CSS/logIn.css">
    <script src="../JS/JQuery.js"></script>
    <title>Регистрация</title>
</head>
<body>
<form id="userForm" method="post" action="LogInOut/LogIn.php">
    <div class="card" id="formCard">
        <h3>Добрый день!</h3>
        <h4>Введите личные данные для прохождения тестирования.</h4>
        <div class="formElement">
            <input type="text" placeholder=" " id="surname" name="surname" required>
            <label for="surname">Фамилия</label>
        </div>
        <div class="formElement">
            <input type="text" placeholder=" " id="name" name="name" required>
            <label for="name">Имя</label>

        </div>
        <div class="formElement">
            <input type="text" placeholder=" " id="lastname" name="lastname" required>
            <label for="lastname">Отчество</label>

        </div>
        <div class="formElement">
            <input type="text" placeholder=" " id="date" name="date_birth" onfocus="(this.type='date')" required>
            <label for="date">Дата рождения</label>

        </div>
        <button id="instructionsBtn" type="button">Перейти к инструкции</button>
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


    <div id="instructionsCard">
        <p>В тестировании приведены описания, которые касаются особенностей поведения людей в различных ситуациях, - в
            виде набора утверждений. Оцените, насколько данные утверждения походят лично Вам. Для этого выберите один из
            4-х возможных ответов:
        </p>
        <ul>
            <li>совершенно верно;</li>
            <li>верно;</li>
            <li>пожалуй, так;</li>
            <li>нет, совсем не так.</li>
        </ul>
        <p>На экране тестирования будут представлены 4 кнопки, которые соответствуют этим вариантам ответа. Вам необходимо нажать нужную кнопку.
            Для перехода от одного вопроса к другому используйте кнопки
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="20" height="20" rx="5" fill="#D1BDE0"/>
                <path d="M14.2956 10.1406H5.42236" stroke="#F4F1F6" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.85898 14.5773L5.42236 10.1407L9.85898 5.7041" stroke="#F4F1F6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            и
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="20" height="20" rx="5" fill="#D1BDE0"/>
                <path d="M5.42266 10.1406L14.2959 10.1406" stroke="#F4F1F6" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9.85928 5.70391L14.2959 10.1405L9.85928 14.5771" stroke="#F4F1F6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            , либо кнопки с номерами вопросов в нижней части экрана.
        <p> Если у Вас нет вопросов, тогда приступайте: читайте утверждения и отмечайте наиболее подходящий вариант.
        </p>
        <button id="startBtn" type="submit">Начать тестирование</button>

    </div>
</form>
</body>

<script>
    let surname = $('#surname'),
        name = $('#name'),
        lastname = $('#lastname'),
        date = $('#date');
    $('#instructionsBtn').click(function () {
        if (surname.val() != '' && name.val() != '' && lastname.val() != '') {
            $("#formCard").fadeOut(1000);
            $("#instructionsCard").fadeIn(1000);
        } else {
            $(".overlay").fadeIn(1000);
        }
    })
    $("#closeModal").click(function (){
        $(".overlay").fadeOut(1000);
    })
    $(".overlay").click(function (){
        $(".overlay").fadeOut(1000);
    })
</script>
</html>
