<?php
include "Elements/PDO.php";
$id = $_GET['id'];
$Answers = getPDO()->query("SELECT * FROM answers WHERE id_answers = $id")->fetch(PDO::FETCH_OBJ);
$result = $Answers->result;
$factor1 = $Answers->factor1;
$factor2 = $Answers->factor2;
$factor3 = $Answers->factor3;
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
    <link rel="stylesheet" href="../CSS/resultTable.css">
    <script src="../JS/JQuery.js"></script>
    <title>Таблица результатов</title>
</head>
<body>
<div class="content">
<table id="results1">
    <tr id="topStroke">
        <th rowspan="1" class="rowname">Наименование шкал методики</th>
        <th colspan="1">Результат тестирования</th>
        <th colspan="1">Низкий риск</th>
        <th colspan="1">Средниий риск</th>
        <th colspan="1">Высокий риск</th>
    </tr>
    <tr>
        <th class="rowname">Шкала "Аддиктивное поведение"</th>
        <th><?php echo "$factor1" ?></th>
        <td>2 и <</td>
        <td>3 - 10</td>
        <td>11 и ></td>
    </tr>
    <tr>
        <th class="rowname">Шкала "Делинквентное поведение"</th>
        <th><?php echo "$factor2" ?></th>
        <td>6 и <</td>
        <td>7 - 20</td>
        <td>21 и ></td>
    </tr>
    <tr>
        <th class="rowname">Шкала "Суицидальное поведение"</th>
        <th><?php echo "$factor3" ?></th>
        <td>4 и <</td>
        <td>5 - 14</td>
        <td>15 и ></td>
    </tr>
    <tr>
        <th class="rowname">Интегральная оценка "Девиантное поведение"</th>
        <th><?php echo "$result" ?></th>
        <td>16 и <</td>
        <td>17 - 41</td>
        <td>42 и ></td>
    </tr>
</table>

<button type="button" onclick="window.location.href='resultsList.php'">К списку участников</button>
</div>
</body>
<script>
    <?php
        echo "let result = ".$result.",";
        echo "factor1 = ".$factor1.",";
        echo "factor2 = ".$factor2.",";
        echo "factor3 = ".$factor3.";";
        ?>
    $('#results1').fadeIn(1000);
    function findingInTable(row,cell){
     $('#results1').find('tr').eq(row).find('td').eq(cell).addClass('select');
 }
 function Result() {
     if (result <= 16){
         findingInTable(4, 0);
     }else if (result >= 16 && result <= 42){
         findingInTable(4, 1);
     }else if (result >= 42){
         findingInTable(4, 2);
     }
 }
 function Factor1() {
     if (factor1 <= 2){
         findingInTable(1, 0);
     }else if (factor1 >= 2 && factor1 <= 11){
         findingInTable(1, 1);
     }else if (factor1 >= 11){
         findingInTable(1, 2);
     }
 }
 function Factor2() {
     if (factor2 <= 6){
         findingInTable(2, 0);
     }else if (factor2 >= 7 && factor2 <= 20){
         findingInTable(2, 1);
     }else if (factor2 >= 21){
         findingInTable(2, 2);
     }
 }
 function Factor3() {
     if (factor3 <= 4){
         findingInTable(3, 0);
     }else if (factor3 >= 5 && factor3 <= 14){
         findingInTable(3, 1);
     }else if (factor3 >= 15){
         findingInTable(3, 2);
     }
 }
 setTimeout(Factor1, 1000);
 setTimeout(Factor2, 1500);
 setTimeout(Factor3, 2000);
 setTimeout(Result, 2500);

</script>
</html>
