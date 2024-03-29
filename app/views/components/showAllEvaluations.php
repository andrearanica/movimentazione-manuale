<div id="table" class="card text-center my-4 table-responsive" style='border: none;'>
    <?php

    $ip = '127.0.0.1';
    $user = 'root';
    $password = getenv('PASSWORD');
    $db = 'my_andrearanica';

    $connection = new \mysqli($ip, $user, $password, $db);

    $id = $_SESSION['id'];

    if ($_SESSION['role'] == 1) {
        $query = 'SELECT * FROM evaluations JOIN users ON evaluations.author=users.id ORDER BY businessName, evaluation_id DESC, valid DESC';
    } else if ($_SESSION['role'] == 2) {
        $query = "SELECT * FROM evaluations JOIN users ON evaluations.author=users.id WHERE author=$id ORDER BY businessName, valid DESC, evaluation_id;";
    } else if ($_SESSION['role'] == 0) {
        $username = $_SESSION['username'];
        $query = "SELECT * FROM evaluations JOIN users ON evaluations.author=users.id WHERE businessName='$username' ORDER BY businessName;";
    }

    $result = $connection->query($query);

    $json = [];
    $n = 0;

    if ($_SESSION['role'] == 1) {
        echo '<h1>Tutte le valutazioni</h1>';
    } else {
        echo '<h1>Tutte le tue valutazioni</h1>';
    }

    if ($_SESSION['role'] != 0) {
        echo '<table style="border-radius: 10px;"><tr style="border: 1px solid black;"><th></th><th></th><th>ID</th><th>Autore</th><th>Ragione sociale</th><th>Data di rilascio</th><th>Costo</th><th>Peso realmente sollevato</th><th>Peso massimo sollevabile</th><th>Indice</th><th>Documento</th><th>Validità</th></tr>';
    } else {
        echo '<table style="border-radius: 10px;"><tr style="border: 1px solid black;"><th>ID</th><th>Autore</th><th>Ragione sociale</th><th>Data di rilascio</th><th>Costo</th><th>Peso realmente sollevato</th><th>Peso massimo sollevabile</th><th>Indice</th><th>Documento</th><th>Validità</th></tr>';
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['evaluation_id'];
            $author = $row['username'];
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
            if ($_SESSION['role'] != 0) {
                echo ($maximumWeight != -1) ? "<tr style='border: 1px solid black;'><td><a class='btn' data-bs-toggle='modal' data-bs-target='#deleteEvaluationModal' onclick='removeEvaluation(`$id`)'>🗑️</a></td><td><button id='editEvaluationButton' onclick='fillForm($id)' class='btn' data-bs-toggle='modal' data-bs-target='#editEvaluationModal'>✏️</button></td><td>$id</td><td>$author</td><td>$businessName</td><td>$date</td><td>$cost €</td><td>$realWeight kg</td><td>$maximumWeight kg</td><td>$IR</td><td><a target='_blank' style='color: black; text-decoration: underline;' href='printPdf?id=$id'>PDF</a></td>$post</tr>" : "<tr style='border: 1px solid black;'><td><a class='btn' data-bs-toggle='modal' data-bs-target='#deleteEvaluationModal' onclick='removeEvaluation(`$id`)'>🗑️</a></td><td><button id='editEvaluationButton'  onclick='fillForm($id)' class='btn' data-bs-toggle='modal' data-bs-target='#editEvaluationModal'>✏️</button></td><td>$id</td><td>$author</td><td>$businessName</td><td>$date</td><td>$cost €</td><td>$realWeight kg</td><td>Non calcolabile</td><td>Non calcolabile</td><td><a target='_blank' style='color: black; text-decoration: underline;' href='printPdf?id=$id'>PDF</a></td>$post</tr>";
            } else {
                echo ($maximumWeight != -1) ? "<tr style='border: 1px solid black;'><td>$id</td><td>$author</td><td>$businessName</td><td>$date</td><td>$cost €</td><td>$realWeight kg</td><td>$maximumWeight kg</td><td>$IR</td><td><a target='_blank' style='color: black; text-decoration: underline;' href='printPdf?id=$id'>PDF</a></td>$post</tr>" : "<tr style='border: 1px solid black;'><td>$id</td><td>$author</td><td>$businessName</td><td>$date</td><td>$cost €</td><td>$realWeight kg</td><td>Non calcolabile</td><td>Non calcolabile</td><td><a target='_blank' style='color: black; text-decoration: underline;' href='printPdf?id=$id'>PDF</a></td>$post</tr>";
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
<div class="modal fade" id="deleteEvaluationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina valutazione</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id='deleteEvaluationBody'>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <a id='deleteEvaluationA'><button type="button" class="btn btn-primary">Conferma</button></a>
      </div>
    </div>
  </div>
</div>