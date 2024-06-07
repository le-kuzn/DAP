<?php include "Elements/PDO.php";
session_start();
if(!isset($_SESSION['id_user'])){
    header('Location:userLogIn.php');}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../SVG/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/root.css">
    <link rel="stylesheet" href="../CSS/testEnd.css">
    <script src="../JS/JQuery.js"></script>
    <title>Завершение тестирования</title>
</head>
<body>
<div id="wndBlock">
    <h1>Благодарим за прохождение тестирования!</h1>
    <h2>Это окно закроется автоматически! До свидания!</h2>
    <div id="wndBlockAnimation">
        <svg width="50" height="50" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M80.625 19.125L43 76.6875L18.625 55.625"  stroke-width="6" stroke-linecap="round" class="svg-elem-1"></path>
        </svg>

    </div>
</div>
</body>
<script>
    function Out(){
        $('#wndBlock').fadeOut(1000, function (){
            window.location.href = "LogInOut/LogOut.php";
        });
    }
    setTimeout(Out, 4000);
</script>
</html>
