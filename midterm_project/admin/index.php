<?php
require_once('../db_connect.php');
require_once('../model/vehicles_db.php');

if (isset($_POST['delete_vehicle']) && isset($_POST['id'])) {
    deleteVehicle($pdo, $_POST['id']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$vehicles = getAllVehicles($pdo);
require_once('../view/admin_vehicles_list.php');
