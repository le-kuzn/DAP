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
    <link rel="stylesheet" href="../CSS/testPage.css">
    <link rel="stylesheet" href="../CSS/testSave.css">
    <script src="../JS/JQuery.js"></script>

    <title>Тестирование ДАП</title>
</head>
<body>

<form id="form" method="post" action="testSave.php">
    <?php
    $qText = getPDO()->query("SELECT * FROM questions")->fetchAll(PDO::FETCH_OBJ);
    foreach ($qText as $qTextObj) {
        echo '
    <div class="questionCard">
        <div class="questionNumber">
            ' . $qTextObj->id . '
        </div>
        <div class="questionInfo">
           
              <h3 class="questionText"> ' . $qTextObj->question . '</h3>
            
            <div class="line"></div>
            <div class="answerButtons">

                <div class="form_radio_btn">
                    <input class="answerR" id="answer1' . $qTextObj->id . '" type="radio" name="answer' . $qTextObj->id . '" value="3" required>
                    <label for="answer1' . $qTextObj->id . '">совершенно верно</label>
                </div>

                <div class="form_radio_btn">
                    <input class="answerR" id="answer2' . $qTextObj->id . '" type="radio" name="answer' . $qTextObj->id . '" value="2">
                    <label for="answer2' . $qTextObj->id . '">верно</label>
                </div>

                <div class="form_radio_btn">
                    <input class="answerR" id="answer3' . $qTextObj->id . '" type="radio" name="answer' . $qTextObj->id . '" value="1">
                    <label for="answer3' . $qTextObj->id . '">пожалуй, так</label>
                </div>

                <div class="form_radio_btn">
                    <input class="answerR" id="answer4' . $qTextObj->id . '" type="radio" name="answer' . $qTextObj->id . '" value="0">
                    <label for="answer4' . $qTextObj->id . '">нет, совсем не так</label>
                </div>
            </div>
        </div>';

        if ($qTextObj->id != 48){
            echo '<button type="button"  class="switchBtn previousBtn"><img src="../SVG/btnPrevious.svg"></button>';

            echo '<button type="button"  class="switchBtn nextBtn"><img src="../SVG/btnNext.svg"></button>';
        } else {
            echo '<button type="submit"  class="switchBtn endBtn">Завершить</button>';
        }
     echo ' 
        <!--</div>-->
    </div>
     ';
    }
    ?>
    <div class="overlay">
        <div class="modal">
            <button type="button" class="close" id="closeModal">
                <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="1" y="1" width="36" height="36" rx="7" stroke="#3B2447" stroke-width="2"/>
                    <path d="M28.0986 9.90332L9.36621 28.6357" stroke="#3B2447" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.36621 9.90332L28.0986 28.6357" stroke="#3B2447" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <h3>Пожалуйста, ответьте на все вопросы!</h3></div>
    </div>
</form>
<div id="questionList">

    <div class="buttons">
        <?php
        foreach ($qText as $qTextObj) {
            echo ' 
            <button class="numberBut">' . $qTextObj->id . '</button>
            ';
        }
        ?>
    </div>
</div>
<!--<div id="VideoBlock">
    <video id="VideoGo" loop  loop src="Elements/videoplayback2.mp4" type="video/webm">
    </video>
</div>-->
</body>
<script>
    let Card = document.querySelectorAll(".questionCard"),
        Number = document.querySelectorAll(".numberBut"),
        Radio = document.querySelectorAll(".answerR"),
        i = 0,
        count = 0,
        r = 0;
    if (i === 0) {
        Card[i].style.display = 'block';
        Number[i].classList.add('currentQ');
    }
    $('.nextBtn').click(function () {
        if (i != 47) {
            Card[i].style.display = 'none';
            Number[i].classList.remove('currentQ');
            i++;
            Card[i].style.display = 'block';
            Number[i].classList.add('currentQ');
            RadioChecked()
        }/*else if (i === 47) {
            $("#VideoBlock").css({
                opacity: "1",
                scale: "1",
                display: "inline-flex"
            })
            $("#VideoGo").css({
                opacity: "1",
                scale: "1"
            }).get(0).play();
        }*/
    })
    $('.previousBtn').click(function () {
        if (i != 0) {
            Card[i].style.display = 'none';
            Number[i].classList.remove('currentQ');
            i--;
            Card[i].style.display = 'block';
            Number[i].classList.add('currentQ');
            RadioChecked()
        }
    })
    Number.forEach(function(elem, j){
        elem.addEventListener('click', function(){
            Card[i].style.display = 'none';
            Number[i].classList.remove('currentQ');
            i = j;
            Card[j].style.display = 'block';
            Number[j].classList.add('currentQ');    });
    });
    function RadioChecked(){
        for (r = 0; r <= Radio.length - 4; r += 4){
            if (Radio[r].checked === true || Radio[r+1].checked === true || Radio[r+2].checked === true || Radio[r+3].checked === true){
                Number[count].classList.add('checkedQ');
                Number[count].classList.remove('ncheckedQ');
            }
            count++
        }
        count = 0;
    }

    $('.endBtn').click(function (){
        let c = 0;
        for (r = 0; r <= Radio.length - 4; r += 4){
            if (Radio[r].checked === false && Radio[r+1].checked === false && Radio[r+2].checked === false && Radio[r+3].checked === false){
                Number[c].classList.add('ncheckedQ');
                $(".overlay").fadeIn(1000);
            }
            c++;
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
