<div class='card container my-4 text-center'>
    <div class='my-2'>
        <h4><b>Statistiche dei lavoratori</b></h4>
        <center><table class='text-center'>
            <tr><th>ID</th><th>Nome</th><th>Valutazioni compilate</th></tr>
            <tr>
            <?php

            $ip = '127.0.0.1';
            $user = 'root';
            $password = '';
            $db = 'my_andrearanica';

            $connection = new \mysqli($ip, $user, $password, $db);

            $query = "SELECT author, name_surname, COUNT(*) AS num_evaluations FROM evaluations JOIN users ON evaluations.author=users.id GROUP BY users.id";
            $stmt = $connection->prepare($query);
            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $id = $row['author'];
                $name_surname = $row['name_surname'];
                $num_evaluations = $row['num_evaluations'];
                echo "<td>$id</td><td>$name_surname</td><td>$num_evaluations</td>";
            }

            ?>

            </tr>
        </table></center>
    </div>
</div>