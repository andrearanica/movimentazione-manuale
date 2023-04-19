<?php

namespace App\controllers;
class SiteController {
    public function Home () {
        require_once '../app/views/home.php';
    }
    public function Dashboard () {
        require_once '../app/views/admin.php';
    }
    public function Help () {
        require_once '../app/views/help.php';
    }
    public function NotFound () {
        require_once '../app/views/404.php';
        http_response_code(404);
    }
}

?>