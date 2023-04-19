<div id="table" class="card text-center my-2">
    <?php

    $ip = '127.0.0.1';
    $user = 'root';
    $password = '';
    $db = 'my_andrearanica';

    $connection = new \mysqli($ip, $user, $password, $db);

    $id = $_SESSION['id'];

    if ($_SESSION['role'] == 1) {
        $query = 'SELECT * FROM evaluations';
    } else if ($_SESSION['role'] == 2) {
        $query = "SELECT * FROM evaluations WHERE author=$id;";
    } else if ($_SESSION['role'] == 0) {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM evaluations WHERE businessName='$username';";
    }

    $result = $connection->query($query);

    $json = [];
    $n = 0;

    if ($_SESSION['role'] == 1) {
        echo '<h1>Tutte le valutazioni</h1>';
    } else {
        echo '<h1>Tutte le tue valutazioni</h1>';
    }

    echo '<table style="border-radius: 10px;"><tr style="border: 1px solid black;"><th></th><th>ID</th><th>Ragione sociale</th><th>Data di rilascio</th><th>Costo</th><th>Peso realmente sollevato</th><th>Peso massimo sollevabile</th><th>Indice</th><th>Documento</th><th>Validità</th></tr>';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $businessName = $row['businessName'];
            $date = $row['date'];
            $cost = $row['cost'];
            $realWeight = $row['realWeight'];
            $maximumWeight = $row['maximumWeight'];
            $IR = $row['IR'];
            $valid = $row['valid'];
            if ($valid == 1) {
                $post = '<td style="color: green;">Valida</td>';
            } else {
                $post = '<td style="color: red;">Scaduta</td>';
            }
            if ($maximumWeight != -1) {
                echo "
                <tr style='border: 1px solid black;'><td><img width='40' src='./pencil.jpg'></td><td>$id</td><td>$businessName</td><td>$date</td><td>$cost €</td><td>$realWeight kg</td><td>$maximumWeight kg</td><td>$IR</td><td><a style='color: black; text-decoration: underline;' href='printPdf?id=$id'>PDF</a></td>$post</tr>
                ";
            } else {
                echo "
                <tr style='border: 1px solid black;'><td><img width='40' src='./pencil.jpg'></td><td>$id</td><td>$businessName</td><td>$date</td><td>$cost €</td><td>$realWeight kg</td><td>Non calcolabile</td><td>Non calcolabile</td><td><a style='color: black; text-decoration: underline;' href='printPdf?id=$id'>PDF</a></td>$post</tr>
                ";
            }
            
        }
    }
    echo '</table>';

    if (isset($_GET['result'])) { 
        if ($_GET['result'] == 'success') {
            echo '<div class="alert alert-success container my-2" style="width: 50%"><b>Valutazione inserita con successo</b></div>';
        }
    }

    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'data') {
            echo '<div class="alert alert-danger container my-2" style="width: 50%"><b>Controlla </b> che i dati inseriti rispettino i seguenti criteri: <br />Di aver inserito tutti i campi<br />Carichi di peso superiore a 3 kg<br />Carichi di peso inferiori a 30 kg</div>';
        }
    }

    ?>
</div>