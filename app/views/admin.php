<?php

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_SESSION['username'])) {
    
} else {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php require('../app/views/components/navbar.php'); ?>
        <center><div class="my-5 text-center">
            <?php if ($_SESSION['role'] != 0) { require('../app/views/components/newEvaluationModal.php'); } ?>
            <?php if ($_SESSION['role'] == 1) { require('../app/views/components/newUser.php'); } ?>
            <?php if ($_SESSION['role'] != 0) { require('../app/views/components/searchEvaluation.php'); } ?>
            <?php require('../app/views/components/showAllEvaluations.php'); ?>
            <?php require('../app/views/components/modifyEvaluationModal.php'); ?>
            <?php
            if (isset($_GET['error'])){
                if ($_GET['error'] == 'none') {
                    echo '<div class="container alert alert-success"><b>Operazione avvenuta con successo</b></div>';
                }
            }            
            ?>
        </div></center>
        <script src="script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    </body>
</html>