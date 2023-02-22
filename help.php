<?php

session_start();

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
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <?php require('./components/navbar.php'); ?>
        <div class="container my-5 text-center">
            <h1>Guida</h1>
            <button class="btn btn-primary my-2" type="button" data-bs-toggle="collapse" data-bs-target="#1" aria-expanded="false" aria-controls="collapseExample">
                Cos'è la movimentazione manuale dei carichi?
            </button>
            <div class="collapse my-2" id="1">
                <div class="card card-body">
                    Secondo il D.Lgs. 81/08 - Titolo VI, per movimentazione manuale dei carichi si intendono le operazioni di trasporto o di sostegno di un carico ad opera di uno o più lavoratori, comprese le azioni del sollevare, deporre, spingere, tirare, portare o spostare un carico che, per le loro caratteristiche o in conseguenza delle condizioni ergonomiche sfavorevoli, comportano tra l’altro rischi di lesioni lombari. Vengono definite “Patologie da sovraccarico biomeccanico” quelle patologie delle strutture osteoarticolari, muscolo-tendinee e neurovascolari.
                </div>
            </div><br />
            <button class="btn btn-primary my-2" type="button" data-bs-toggle="collapse" data-bs-target="#2" aria-expanded="false" aria-controls="collapseExample">
                Quali sono gli obblighi del datore di lavoro?
            </button>
            <div class="collapse my-2" id="2">
                <div class="card card-body">
                    Il datore di lavoro deve adottare le misure organizzative necessarie o ricorre a mezzi appropriati per evitare la necessità di una movimentazione manuale dei carichi da parte dei lavoratori. Se ciò non fosse possibile è necessario ridurre l’esposizione al rischio organizzando i posti di lavoro in modo che la movimentazione sia quanto più possibile sicura e sana, forma e informa i lavoratori sulle caratteristiche dei carichi e sui corretti metodi di sollevamento e mette in atto la sorveglianza sanitaria.
                </div>
            </div><br />
            <button class="btn btn-primary my-2" type="button" data-bs-toggle="collapse" data-bs-target="#3" aria-expanded="false" aria-controls="collapseExample">
                Come si calcola il rischio?
            </button>
            <div class="collapse my-2" id="3">
                <div class="card card-body">
                    Per riuscire a fornire una giusta scala di valutazione dei rischi è usata la tabella NIOSH che consente il calcolo degli indici di sollevamento: inserendo opportuni valori si ottiene un valore dell’indice di sollevamento. In base a questo valore, chiamato indice di sollevamento, il datore di lavoro è in grado di conoscere gli obblighi per limitare i rischi. Questo indice viene calcolato tramite il quoziente tra il peso realmente sollevato e il peso raccomandato, calcolato a partire dal peso massimo sollevabile in condizioni ideali (23kg) e moltiplicandolo per vari fattori. Sotto a questo paragrafo vengono mostrate le tabelle per il calcolo dei vari fattori.
                </div>
            </div><br />
            <button class="btn btn-primary my-2" type="button" data-bs-toggle="collapse" data-bs-target="#4" aria-expanded="false" aria-controls="collapseExample">
                Inserimento di una nuova valutazione
            </button>
            <div class="collapse my-2" id="4">
                <div class="card card-body">
                    Il calcolo dell'indice è automatico: vengono richiesti tutti i parametri necessari e viene costruito un PDF stampabile da inviare all'azienda interessata. Tra le varie informazioni, vengono mostrate le aggiunte necessarie per rendere la movimentazione sicura e a norma.
                </div>
            </div><br />
        </div>
        
        <script src="" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    </body>
</html>