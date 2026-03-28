<?php
require_once('../db_connect.php');
require_once('../model/vehicles_db.php');
require_once('../model/makes_db.php');
require_once('../model/types_db.php');
require_once('../model/classes_db.php');

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    addVehicle(
        $pdo,
        $_POST['year'],
        trim($_POST['model']),
        $_POST['price'],
        $_POST['make_id'],
        $_POST['type_id'],
        $_POST['class_id']
    );
    $success = true;
}

$makes   = getAllMakes($pdo);
$types   = getAllTypes($pdo);
$classes = getAllClasses($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Vehicle | Zippy Used Autos</title>
    <link rel="stylesheet" href="/midterm_project/css/admin.css">
</head>
<body>

<?php require_once(dirname(__FILE__) . '/../view/admin_nav.php'); ?>

<main>
    <h2>Add New Vehicle</h2>

    <?php if ($success): ?>
        <div class="success">&#10003; Vehicle added successfully! <a href="index.php">View all vehicles</a></div>
    <?php endif; ?>

    <div class="form-card">
        <form method="post">
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" name="year" min="1990" max="2099" placeholder="e.g. 2022" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" id="model" name="model" placeholder="e.g. Camry" required>
            </div>
            <div class="form-group">
                <label for="price">Price ($)</label>
                <input type="number" id="price" name="price" min="0" step="0.01" placeholder="e.g. 24999.00" required>
            </div>
            <div class="form-group">
                <label for="make_id">Make</label>
                <select id="make_id" name="make_id" required>
                    <option value="">Select a make</option>
                    <?php foreach ($makes as $make): ?>
                        <option value="<?= $make['id'] ?>"><?= htmlspecialchars($make['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="type_id">Type</label>
                <select id="type_id" name="type_id" required>
                    <option value="">Select a type</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type['id'] ?>"><?= htmlspecialchars($type['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="class_id">Class</label>
                <select id="class_id" name="class_id" required>
                    <option value="">Select a class</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class['id'] ?>"><?= htmlspecialchars($class['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn-submit">Add Vehicle</button>
        </form>
    </div>
</main>

<?php require_once(dirname(__FILE__) . '/../view/admin_footer.php'); ?>
</body>
</html>
