<?php

if (isset($_SESSION['username'])) {
  header('Location: admin.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Movimentazione manuale dei carichi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container text-center my-5">
            <h1>Movimentazione Manuale dei Carichi</h1>
                    <div class="modal-body">
                        <form action="./php/login.php" method="POST">
                            <input class="form-control my-2 text-center" type="text" name="username" placeholder="Username">
                            <input class="form-control my-2 text-center" type="password" name="password" placeholder="Password">
                            <input class="btn btn-primary" type="submit" value="Login">
                        </form>
                        <?php
                        if (isset($_GET['error'])) {
                          echo '<div class="alert alert-danger my-2"><b>Credenziali sbagliate</b></div>';
                        }
                        ?>
                    </div>
        </div>
        
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>