<?php
function getAllVehicles($pdo, $sort = 'price', $filter_make = null, $filter_type = null, $filter_class = null) {
    $order = ($sort === 'year') ? 'v.year DESC' : 'v.price DESC';

    $conditions = [];
    $params = [];

    if ($filter_make) {
        $conditions[] = 'v.make_id = :make_id';
        $params[':make_id'] = $filter_make;
    }
    if ($filter_type) {
        $conditions[] = 'v.type_id = :type_id';
        $params[':type_id'] = $filter_type;
    }
    if ($filter_class) {
        $conditions[] = 'v.class_id = :class_id';
        $params[':class_id'] = $filter_class;
    }

    $where = count($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

    $sql = "SELECT v.id, v.year, v.model, v.price,
                   ma.name AS make, t.name AS type, c.name AS class
            FROM vehicles v
            JOIN makes ma ON v.make_id = ma.id
            JOIN types t  ON v.type_id = t.id
            JOIN classes c ON v.class_id = c.id
            $where
            ORDER BY $order, v.id DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addVehicle($pdo, $year, $model, $price, $make_id, $type_id, $class_id) {
    $stmt = $pdo->prepare("INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
                           VALUES (:year, :model, :price, :make_id, :type_id, :class_id)");
    $stmt->execute([
        ':year'     => $year,
        ':model'    => $model,
        ':price'    => $price,
        ':make_id'  => $make_id,
        ':type_id'  => $type_id,
        ':class_id' => $class_id
    ]);
}

function deleteVehicle($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM vehicles WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
