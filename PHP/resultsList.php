<?php
include 'Elements/PDO.php';
$Answers = getPDO()->query("SELECT * FROM answers ORDER BY id_answers")->fetchAll(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="../CSS/resultsList.css">
    <script src="../JS/JQuery.js"></script>
    <title>Список прошедших</title>
</head>
<body>
<button type="button" onclick="window.location.href='Expert/expertOut.php'">Выйти</button>
<div id="users">
    <?php
    foreach ($Answers as $answer) {
        $user = getPDO()->query("SELECT * FROM users where id_user = $answer->id_user ")->fetch(PDO::FETCH_OBJ);
        echo '<a href="resultsTable.php?id=' . $answer->id_answers . '" id="' . $answer->id_answers . '">
        <div class="userCard">
            <div class="userNumber">' . $answer->id_answers . '</div>
            <div class="userInfo">
                <p>' . $user->surname . '</p>
                <p>' . $user->name . '</p>
                <p>' . $user->lastname . '</p>
                <p>' . $user->date_registration . '</p>
                <p>' . $answer->result . '</p>
            </div>
        </div>
    </a>';
    }
    ?>


</div>
</body>
</html>
