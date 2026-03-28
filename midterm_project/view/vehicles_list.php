<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" href="/midterm_project/css/style.css">
</head>
<body>

<header>
    <h1>&#128663; Zippy Used Autos</h1>
    <span>Quality pre-owned vehicles</span>
</header>

<?php
    $current_sort = isset($_GET['sort']) ? $_GET['sort'] : 'price';
    $filter_make  = isset($_GET['filter_make'])  ? $_GET['filter_make']  : '';
    $filter_type  = isset($_GET['filter_type'])  ? $_GET['filter_type']  : '';
    $filter_class = isset($_GET['filter_class']) ? $_GET['filter_class'] : '';

    $next_sort  = ($current_sort === 'price') ? 'year' : 'price';
    $sort_label = ($current_sort === 'price') ? 'Price: High to Low' : 'Year: Newest First';
    $next_label = ($current_sort === 'price') ? '&#8645; Switch to Year' : '&#8645; Switch to Price';

    $sort_url = '?sort=' . $next_sort
        . ($filter_make  ? '&filter_make='  . urlencode($filter_make)  : '')
        . ($filter_type  ? '&filter_type='  . urlencode($filter_type)  : '')
        . ($filter_class ? '&filter_class=' . urlencode($filter_class) : '');

    $has_filters = $filter_make || $filter_type || $filter_class;
?>

<div class="controls">
    <form method="get">
        <input type="hidden" name="sort" value="<?= htmlspecialchars($current_sort) ?>">
        <div class="controls-inner">

            <div class="control-group">
                <label for="filter-make">Make</label>
                <select name="filter_make" id="filter-make">
                    <option value="">All Makes</option>
                    <?php foreach ($makes as $make): ?>
                        <option value="<?= $make['id'] ?>" <?= $filter_make == $make['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($make['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="control-group">
                <label for="filter-type">Type</label>
                <select name="filter_type" id="filter-type">
                    <option value="">All Types</option>
                    <?php foreach ($types as $type): ?>
                        <option value="<?= $type['id'] ?>" <?= $filter_type == $type['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($type['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="control-group">
                <label for="filter-class">Class</label>
                <select name="filter_class" id="filter-class">
                    <option value="">All Classes</option>
                    <?php foreach ($classes as $class): ?>
                        <option value="<?= $class['id'] ?>" <?= $filter_class == $class['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($class['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="control-group">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-filter">Search</button>
            </div>

            <?php if ($has_filters): ?>
            <div class="control-group">
                <label>&nbsp;</label>
                <a href="?sort=<?= htmlspecialchars($current_sort) ?>" class="btn btn-clear">&#10005; Clear</a>
            </div>
            <?php endif; ?>

            <div class="divider"></div>

            <div class="control-group">
                <label>Sorted by</label>
                <a href="<?= $sort_url ?>" class="btn btn-sort"><?= $sort_label ?> &nbsp;<?= $next_label ?></a>
            </div>

        </div>

        <?php if ($has_filters): ?>
        <div class="active-filters">
            Active filters:
            <?php
                foreach ($makes   as $m) { if ($filter_make  == $m['id']) echo '<span>' . htmlspecialchars($m['name']) . '</span>'; }
                foreach ($types   as $t) { if ($filter_type  == $t['id']) echo '<span>' . htmlspecialchars($t['name']) . '</span>'; }
                foreach ($classes as $c) { if ($filter_class == $c['id']) echo '<span>' . htmlspecialchars($c['name']) . '</span>'; }
            ?>
        </div>
        <?php endif; ?>
    </form>
</div>

<main>
    <p class="results-count"><?= count($vehicles) ?> vehicle<?= count($vehicles) !== 1 ? 's' : '' ?> found</p>

    <?php if (empty($vehicles)): ?>
        <p style="color:#999; text-align:center; margin-top:60px;">No vehicles match your filters.</p>
    <?php else: ?>
        <div class="grid">
            <?php foreach ($vehicles as $v): ?>
                <div class="card">
                    <div class="card-header">
                        <div class="year-model"><?= $v['year'] ?> <?= htmlspecialchars($v['model']) ?></div>
                        <div class="make"><?= htmlspecialchars($v['make']) ?></div>
                    </div>
                    <div class="card-body">
                        <div class="price">$<?= number_format($v['price'], 2) ?></div>
                        <div class="badges">
                            <span class="badge badge-type"><?= htmlspecialchars($v['type']) ?></span>
                            <span class="badge badge-class"><?= htmlspecialchars($v['class']) ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<footer>
    &copy; <?= date('Y') ?> Zippy Used Autos. All rights reserved.
</footer>

</body>
</html>
