<?php

namespace App\controllers;

use mysqli;

class AjaxController {
    public function HandleRequest () {
        $request = $_GET['request'];
        switch ($request) {
            case 'getEvaluation': 

                $ip = '127.0.0.1';
                $user = 'root';
                $password = getenv('PASSWORD');
                $db = 'my_andrearanica';

                $connection = new mysqli($ip, $user, $password, $db);
                if (isset($_REQUEST['id'])) {
                    $id = $_REQUEST['id'];
                    $query = "SELECT * FROM evaluations WHERE evaluation_id='$id';";
                } else {
                    $businessName = $_REQUEST['businessName'];
                    if ($_SESSION['role'] == 1) {
                        $query = "SELECT * FROM evaluations WHERE businessName='$businessName';";
                    } else {
                        $id = $_SESSION['id'];
                        $query = "SELECT * FROM evaluations WHERE businessName='$businessName' AND author='$id';";
                    }
                    
                }
                $result = $connection->query($query);

                $json = [];
                $n = 0;

                while ($row = $result->fetch_assoc()) {
                    $json[$n] = $row;
                    $n++;
                }

                echo json_encode($json);
                break;
            case 'tableInfo': 
                $ip = '127.0.0.1';
                $user = 'root';
                $password = '';
                $db = 'my_andrearanica';

                $connection = new mysqli($ip, $user, $password, $db);

                if (isset($_GET['table'])) {
                    if ($_GET['table'] == 'heightFromGround') {
                        $query = 'SELECT * FROM heightfromground;';
                    } else if ($_GET['table'] == 'verticalDistance') {
                        $query = 'SELECT * FROM verticaldistance;';
                    } else if ($_GET['table'] == 'horizontalDistance') {
                        $query = 'SELECT * FROM horizontaldistance;';
                    } else if ($_GET['table'] == 'angularDisplacement') {
                        $query = 'SELECT * FROM angulardisplacement;';
                    } else if ($_GET['table'] == 'gripValue') {
                        $query = 'SELECT * FROM gripvalue;';
                    } 
                }

                $array = [];
                $n = 0;

                $result = $connection->query($query);
                while ($row = $result->fetch_assoc()) {
                    $array[$n] = $row;
                    $n = $n + 1;
                }

                echo json_encode($array);
                break;
        }
    }
}

?>