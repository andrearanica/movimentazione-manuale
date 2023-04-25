<?php

ini_set('display_errors', 1);

if (isset($_SESSION['username'])) {
  // header('Location: dashboard');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Movimentazione manuale dei carichi</title>
        <meta name='description' content=''>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
        <style>
            td, th, tr, table {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <div class='container text-center my-5'>
            <h1>Movimentazione Manuale dei Carichi</h1>
                <form action='loginHandler' method='POST'>
                    <input class='form-control my-2 text-center' type='text' name='username' placeholder='Username' required>
                    <input class='form-control my-2 text-center' type='password' name='password' placeholder='Password' required>
                    <input class='btn btn-primary my-2' type='submit' value='Login'>
                </form>
                <?php
                if (isset($_GET['error'])) {
                    echo "<div class='container my-4 alert alert-danger'>Credenziali sbagliate</div>";
                }
                ?>
            <button type='button' class='btn btn-primary my-2' data-bs-toggle='modal' data-bs-target='#info-modal'>
                Aiuto
            </button>

            <div class='modal fade' id='info-modal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Aiuto</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <h4>Account</h4>
                            <p>Un account può appartenere a un ruolo fra:</p>
                            <ul>
                                <li><b>Admin</b>: può eseguire tutte le operazioni e creare nuovi utenti</li>
                                <li><b>Operatore</b>: può solamente inserire nuove valutazioni e visualizzare quelle create da sè stesso</li>
                                <li><b>Azienda</b>: può solamente visualizzare le valutazioni della propria azienda</li>
                            </ul>
                            <b>Per testare il funzionamento del programma sono stati preparati 3 utenti demo</b><br>
                            <table class='container text-center'>
                                <tr><th>Ruolo</th><th>Username</th><th>Password</th></tr>
                                <tr><td>Admin</td><td>mauriziogaffuri</td><td>mauriziogaffuri</td></tr>
                                <tr><td>Operatore</td><td>operatore</td><td>operatore</td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src='script.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
    </body>
</html>