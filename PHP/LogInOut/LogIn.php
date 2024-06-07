<?php
include "../Elements/PDO.php";
$Surname = $_POST['surname'];
$Name = $_POST['name'];
$Lastname = $_POST['lastname'];
$DateBirth = $_POST['date_birth'];
$RegistrationDate = date('Y-m-d');

getPDO()->query("INSERT INTO users ( surname, name, lastname, date_birth, date_registration) VALUES ('$Surname', '$Name', '$Lastname', '$DateBirth', '$RegistrationDate')");
$Users = getPDO()->query("SELECT * FROM users where surname = '$Surname' AND name = '$Name' AND lastname = '$Lastname' AND date_birth = '$DateBirth' AND date_registration = '$RegistrationDate' ORDER BY id_user DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
if ($Users["id_user"] > 0) {
    session_start();
    $_SESSION['id_user'] = $Users['id_user'];
    $_SESSION['name'] = $Users['name'];
    $_SESSION['surname'] = $Users['surname'];
    $_SESSION['lastname'] = $Users['lastname'];
    header('Location:../testPage.php');
} else {
    $_SESSION['message'] = "Логин или пароль неправильно.";
    header('Location:../userLogIn.php');
}