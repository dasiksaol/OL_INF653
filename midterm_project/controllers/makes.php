<?php
require_once('db_connect.php');
require_once('model/makes_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_make']) && !empty($_POST['name'])) {
        addMake($pdo, trim($_POST['name']));
    }
    if (isset($_POST['delete_make']) && isset($_POST['id'])) {
        deleteMake($pdo, $_POST['id']);
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$makes = getAllMakes($pdo);
require_once('view/makes_list.php');
