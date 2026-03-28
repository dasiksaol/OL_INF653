<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Vehicles | Zippy Used Autos</title>
    <link rel="stylesheet" href="/midterm_project/css/admin.css">
</head>
<body>

<?php require_once(dirname(__FILE__) . '/admin_nav.php'); ?>

<main>
    <h2>All Vehicles (<?= count($vehicles) ?>)</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Year</th>
                <th>Model</th>
                <th>Make</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $v): ?>
                <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['year'] ?></td>
                    <td><?= htmlspecialchars($v['model']) ?></td>
                    <td><?= htmlspecialchars($v['make']) ?></td>
                    <td><?= htmlspecialchars($v['type']) ?></td>
                    <td><?= htmlspecialchars($v['class']) ?></td>
                    <td>$<?= number_format($v['price'], 2) ?></td>
                    <td>
                        <form method="post" onsubmit="return confirm('Delete this vehicle?')">
                            <input type="hidden" name="id" value="<?= $v['id'] ?>">
                            <button type="submit" name="delete_vehicle" class="btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php require_once(dirname(__FILE__) . '/admin_footer.php'); ?>
</body>
</html>
