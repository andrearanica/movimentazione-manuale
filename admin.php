<?php

session_start();

?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Movimentazione manuale dei carichi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php require('./components/navbar.php'); ?>
    <div class="container my-5 text-center">
        <h1>Dashboard</h1>
        <?php require('./components/accountInfo.php'); ?>

        <hr />

        <?php require('./components/searchEvaluation.php'); ?>

        <hr />

        <btn id="getAllEvaluationsButton" class="btn btn-primary">Tutte le valutazioni</btn>
        <center>
            <div class="row" id="showAllEvaluations">
            </div>
        </center>

        <hr />

        <?php if ($_SESSION['role'] == 1) { require('./components/newEvaluation.php'); } ?>
        <div class="modal fade" id="evaluationInfoModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Informazioni</h1>
                        <button type="button" id="newEvaluationButtonClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="evaluationInfoModalBody">
                        Caricamento
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>