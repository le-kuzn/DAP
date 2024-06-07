<?php
$login = $_POST['login'];
$password = $_POST['password'];
$expertCode = $_POST['expertCode'];

if ($login === 'expert' && $password === 'Expert2024' && $expertCode === '12345') {
    session_start();
    $_SESSION['expertCode'] = $expertCode;
    header('Location:../resultsList.php');
} else{
    header('Location:expertLogIn.php');
}
