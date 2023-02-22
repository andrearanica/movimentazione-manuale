<div id="table" class="card my-2">
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

    echo '<h1>Tutte le valutazioni</h1><table style="border-radius: 10px;"><tr style="border: 1px solid black;"><th>ID</th><th>Ragione sociale</th><th>Data di rilascio</th><th>Costo</th><th>Peso realmente sollevato</th><th>Peso massimo sollevabile</th><th>IR</th><th>Documento</th></tr>';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $businessName = $row['businessName'];
            $date = $row['date'];
            $cost = $row['cost'];
            $realWeight = $row['realWeight'];
            $maximumWeight = $row['maximumWeight'];
            $IR = $row['IR'];
            echo "
            <tr style='border: 1px solid black;'><td>$id</td><td>$businessName</td><td>$date</td><td>$cost</td><td>$realWeight</td><td>$maximumWeight</td><td>$IR</td><td><a style='color: black; text-decoration: underline;' href='./php/printPdf.php?id=$id'>PDF</a></td></tr>
            ";
        }
    }
    echo '</table>';

    ?>
</div>