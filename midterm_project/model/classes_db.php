<?php
function getAllClasses($pdo) {
    return $pdo->query("SELECT * FROM classes ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
}

function addClass($pdo, $name) {
    $stmt = $pdo->prepare("INSERT INTO classes (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
}

function deleteClass($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM classes WHERE id = :id");
    $stmt->execute([':id' => $id]);
}
