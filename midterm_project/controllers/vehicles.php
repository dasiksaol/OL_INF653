<?php
require_once('db_connect.php');
require_once('model/vehicles_db.php');
require_once('model/makes_db.php');
require_once('model/types_db.php');
require_once('model/classes_db.php');

$sort         = isset($_GET['sort'])         ? $_GET['sort']         : 'price';
$filter_make  = isset($_GET['filter_make'])  && $_GET['filter_make']  !== '' ? $_GET['filter_make']  : null;
$filter_type  = isset($_GET['filter_type'])  && $_GET['filter_type']  !== '' ? $_GET['filter_type']  : null;
$filter_class = isset($_GET['filter_class']) && $_GET['filter_class'] !== '' ? $_GET['filter_class'] : null;

$vehicles = getAllVehicles($pdo, $sort, $filter_make, $filter_type, $filter_class);
$makes    = getAllMakes($pdo);
$types    = getAllTypes($pdo);
$classes  = getAllClasses($pdo);

require_once('view/vehicles_list.php');
