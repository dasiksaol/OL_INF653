<?php
$current     = basename($_SERVER['PHP_SELF']);
$current_dir = basename(dirname($_SERVER['PHP_SELF']));

function nav_class($page) {
    global $current, $current_dir;
    if ($page === 'index'   && $current === 'index.php' && $current_dir === 'admin') return 'active';
    if ($page === 'add'     && $current === 'add_vehicle.php') return 'active';
    if ($page === 'makes'   && $current === 'makes.php')       return 'active';
    if ($page === 'types'   && $current === 'types.php')       return 'active';
    if ($page === 'classes' && $current === 'classes.php')     return 'active';
    return '';
}
?>
<header>
    <h1>&#128663; Zippy Used Autos</h1>
    <span>Admin Panel</span>
</header>

<nav>
    <a href="/midterm_project/admin/"                  class="<?= nav_class('index')   ?>">Vehicles</a>
    <a href="/midterm_project/admin/add_vehicle.php"   class="<?= nav_class('add')     ?>">Add Vehicle</a>
    <a href="/midterm_project/admin/makes.php"         class="<?= nav_class('makes')   ?>">Makes</a>
    <a href="/midterm_project/admin/types.php"         class="<?= nav_class('types')   ?>">Types</a>
    <a href="/midterm_project/admin/classes.php"       class="<?= nav_class('classes') ?>">Classes</a>
</nav>
