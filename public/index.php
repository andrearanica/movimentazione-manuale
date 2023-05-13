<?php

session_start();
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';
use App\controllers\AjaxController;
use App\controllers\SiteController;
use App\controllers\UserController;
use App\controllers\EvaluationController;

$request = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_SPECIAL_CHARS);

$siteController       = new SiteController();
$userController       = new UserController();
$ajaxController       = new AjaxController();
$evaluationController = new EvaluationController();

switch ($request) {
    case '':
        $siteController->Home();
        break;
    case 'dashboard':
        $siteController->Dashboard();
        break;
    case 'loginHandler':
        $userController->Login();
        break;
    case 'ajax': 
        $ajaxController->HandleRequest();
        break;
    case 'newEvaluation':
        $evaluationController->NewEvaluation();
        break;
    case 'editEvaluation':
        $evaluationController->EditEvaluation();
        break;
    case 'deleteEvaluation':
        $evaluationController->DeleteEvaluation();
        break;
    case 'printPdf':
        $evaluationController->PrintPdf();
        break;
    case 'newUser':
        $userController->NewUser();
        break;
    default: 
        $siteController->NotFound();
}

?>