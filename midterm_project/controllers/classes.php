<?php
require_once('db_connect.php');
require_once('model/classes_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_class']) && !empty($_POST['name'])) {
        addClass($pdo, trim($_POST['name']));
    }
    if (isset($_POST['delete_class']) && isset($_POST['id'])) {
        deleteClass($pdo, $_POST['id']);
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$classes = getAllClasses($pdo);
require_once('view/classes_list.php');
