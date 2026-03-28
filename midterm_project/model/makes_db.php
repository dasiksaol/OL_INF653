<?php
function getAllMakes($pdo) {
    return $pdo->query("SELECT * FROM makes ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
}

function addMake($pdo, $name) {
    $stmt = $pdo->prepare("INSERT INTO makes (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
}

function deleteMake($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM makes WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
