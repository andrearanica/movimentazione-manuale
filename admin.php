<?php

session_start();

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
        <?php require('./components/navbar.php'); ?>
        <center><div class="my-5 text-center">
            <button class="btn btn-primary" id="search" data-bs-toggle="modal" data-bs-target="#searchEvaluation">Cerca per ragione sociale</button>
            <?php if ($_SESSION['role'] != 0) { echo '<button type="button" id="newEvaluationButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Inserisci una nuova valutazione</button>'; require('./components/newEvaluationModal.php'); } ?>
            <?php if ($_SESSION['role'] == 1) { echo '<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newAccountModal">Aggiungi nuovo utente</button>'; require('./components/newUser.php'); echo '<br /><br />'; } ?>
            <?php require('./components/showAllEvaluations.php'); ?>
            <?php require('./components/accountInfo.php'); ?>
            <?php require('./components/searchEvaluation.php'); ?>
            <?php
            
            if (isset($_GET['result'])) { 
                if ($_GET['result'] == 'success') {
                    echo '<div class="alert alert-success container"><b>Valutazione inserita con successo</b></div>';
                }
            }

            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'data') {
                    echo '<div class="alert alert-danger container"><b>Controlla </b> che i dati inseriti rispettino i seguenti criteri: <br />Di aver inserito tutti i campi<br />Carichi di peso superiore a 3 kg<br />Carichi di peso inferiori a 30 kg</div>';
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