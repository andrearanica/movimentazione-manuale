<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Mostra tutte le valutazioni
</a>
<div class="collapse" id="collapseExample">
    <div class="card my-2">
    <?php

    $ip = '127.0.0.1';
    $user = 'root';
    $password = '';
    $db = 'my_andrearanica';

    $connection = new mysqli($ip, $user, $password, $db);

    if (!isset($_GET['businessName'])) {
        $query = 'SELECT * FROM evaluations';
    } else {
        $businessName = $_GET['businessName'];
        $query = "SELECT * FROM evaluations WHERE businessName='$businessName';";
    }

    $result = $connection->query($query);

    $json = [];
    $n = 0;

    echo '<table style="border-radius: 10px;"><tr style="border: 1px solid black;"><th>ID</th><th>Ragione sociale</th><th>Data di rilascio</th><th>Altezza da terra</th><th>Distanza verticale</th><th>Distanza orizzontale</th><th>Dislocazione angolare</th><th>Giudizio sulla presa</th><th>Peso realmente sollevato</th><th>Peso massimo sollevabile</th><th>IR</th></tr>';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $businessName = $row['businessName'];
            $date = $row['date'];
            $realWeight = $row['realWeight'];
            $heightFromGround = $row['heightFromGround'];
            $verticalDistance = $row['verticalDistance'];
            $horizontalDistance = $row['horizontalDistance'];
            $angularDisplacement = $row['angularDisplacement'];
            $gripValue = $row['gripValue'];
            $maximumWeight = $row['maximumWeight'];
            $IR = $row['IR'];
            echo "
            <tr style='border: 1px solid black;'><td>$id</td><td>$businessName</td><td>$date</td><td>$heightFromGround</td><td>$verticalDistance</td><td>$horizontalDistance</td><td>$angularDisplacement</td><td>$gripValue</td><td>$realWeight</td><td>$maximumWeight</td><td>$IR</td></tr>
            ";
        }
    }
    echo '</table>';

    ?>
    </div>
</div>