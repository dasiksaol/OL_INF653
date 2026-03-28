<?php
require_once('../db_connect.php');
require_once('../model/types_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_type']) && !empty($_POST['name'])) {
        addType($pdo, trim($_POST['name']));
    }
    if (isset($_POST['delete_type']) && isset($_POST['id'])) {
        deleteType($pdo, $_POST['id']);
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$types = getAllTypes($pdo);
require_once('../view/types_list.php');
