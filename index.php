<?php
require_once 'vendor/autoload.php';

use app\Controllers\VoitureController;

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'list':
            VoitureController::indexAction();
            break;
        case 'create':
            VoitureController::createAction();
            break;
        case 'store':
            VoitureController::storeAction();
            break;
        case 'edit':
            VoitureController::editAction();
            break;
        case 'update':
            VoitureController::updateAction();
            break;
        case 'destroy':
            VoitureController::destroyAction();
            break;
        default:
            echo "Page Not found 404";
            break;
    }
}{
    VoitureController::indexAction();
}