<?php
$nav_links = [
    'index'   => ['label' => 'Vehicles',    'href' => '/midterm_project/admin/'],
    'add'     => ['label' => 'Add Vehicle', 'href' => '/midterm_project/admin/add_vehicle.php'],
    'makes'   => ['label' => 'Makes',       'href' => '/midterm_project/admin/makes.php'],
    'types'   => ['label' => 'Types',       'href' => '/midterm_project/admin/types.php'],
    'classes' => ['label' => 'Classes',     'href' => '/midterm_project/admin/classes.php'],
];
?>
<footer>
    <?php foreach ($nav_links as $key => $link): ?>
        <?php if (nav_class($key) !== 'active'): ?>
            <a href="<?= $link['href'] ?>"><?= $link['label'] ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</footer>
