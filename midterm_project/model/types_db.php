<?php
function getAllTypes($pdo) {
    return $pdo->query("SELECT * FROM types ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
}

function addType($pdo, $name) {
    $stmt = $pdo->prepare("INSERT INTO types (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
}

function deleteType($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM types WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
