<?php
include "Elements/PDO.php";
session_start();
$id_users = $_SESSION['id_user'];
$qText = getPDO()->query("SELECT * FROM questions ORDER BY id")->fetchAll(PDO::FETCH_OBJ);
$result = 0;
$factor1 = 0;
$factor2 = 0;
$factor3 = 0;
foreach ($qText as $q){
    $QuestionsRadio = $_POST['answer'. $q->id];
    $result += $QuestionsRadio;
    switch ($q -> factor){
        case 0:
            break;
        case 1:
            $factor1 += $QuestionsRadio;
            break;
        case 2:
            $factor2 += $QuestionsRadio;
            break;
        case 3:
            $factor3 += $QuestionsRadio;
            break;
    }
}
getPDO()->query("INSERT INTO answers ( `id_user`,  `Result`, `factor1`, `factor2`, `factor3`) VALUES ('$id_users', '$result', '$factor1', '$factor2', '$factor3')");
header('Location:testEnd.php');
