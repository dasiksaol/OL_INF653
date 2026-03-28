<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Makes | Zippy Used Autos</title>
    <link rel="stylesheet" href="/midterm_project/css/admin.css">
</head>
<body>

<?php require_once(dirname(__FILE__) . '/admin_nav.php'); ?>

<main>
    <div class="two-col">
        <div>
            <h2>All Makes</h2>
            <table>
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Action</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($makes as $make): ?>
                        <tr>
                            <td><?= $make['id'] ?></td>
                            <td><?= htmlspecialchars($make['name']) ?></td>
                            <td>
                                <form method="post" onsubmit="return confirm('Delete this make?')">
                                    <input type="hidden" name="id" value="<?= $make['id'] ?>">
                                    <button type="submit" name="delete_make" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="add-form">
            <h2>Add New Make</h2>
            <form method="post">
                <input type="text" name="name" placeholder="Make name (e.g. Toyota)" required>
                <button type="submit" name="add_make" class="btn-add">Add Make</button>
            </form>
        </div>
    </div>
</main>

<?php require_once(dirname(__FILE__) . '/admin_footer.php'); ?>
</body>
</html>
