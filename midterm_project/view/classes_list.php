<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Classes | Zippy Used Autos</title>
    <link rel="stylesheet" href="/midterm_project/css/admin.css">
</head>
<body>

<?php require_once(dirname(__FILE__) . '/admin_nav.php'); ?>

<main>
    <div class="two-col">
        <div>
            <h2>All Classes</h2>
            <table>
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Action</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($classes as $class): ?>
                        <tr>
                            <td><?= $class['id'] ?></td>
                            <td><?= htmlspecialchars($class['name']) ?></td>
                            <td>
                                <form method="post" onsubmit="return confirm('Delete this class?')">
                                    <input type="hidden" name="id" value="<?= $class['id'] ?>">
                                    <button type="submit" name="delete_class" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="add-form">
            <h2>Add New Class</h2>
            <form method="post">
                <input type="text" name="name" placeholder="Class name (e.g. Minivan)" required>
                <button type="submit" name="add_class" class="btn-add">Add Class</button>
            </form>
        </div>
    </div>
</main>

<?php require_once(dirname(__FILE__) . '/admin_footer.php'); ?>
</body>
</html>
