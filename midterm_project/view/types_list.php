<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Types | Zippy Used Autos</title>
    <link rel="stylesheet" href="/midterm_project/css/admin.css">
</head>
<body>

<?php require_once(dirname(__FILE__) . '/admin_nav.php'); ?>

<main>
    <div class="two-col">
        <div>
            <h2>All Types</h2>
            <table>
                <thead>
                    <tr><th>ID</th><th>Name</th><th>Action</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($types as $type): ?>
                        <tr>
                            <td><?= $type['id'] ?></td>
                            <td><?= htmlspecialchars($type['name']) ?></td>
                            <td>
                                <form method="post" onsubmit="return confirm('Delete this type?')">
                                    <input type="hidden" name="id" value="<?= $type['id'] ?>">
                                    <button type="submit" name="delete_type" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="add-form">
            <h2>Add New Type</h2>
            <form method="post">
                <input type="text" name="name" placeholder="Type name (e.g. Van)" required>
                <button type="submit" name="add_type" class="btn-add">Add Type</button>
            </form>
        </div>
    </div>
</main>

<?php require_once(dirname(__FILE__) . '/admin_footer.php'); ?>
</body>
</html>
