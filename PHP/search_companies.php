<?php session_start(); ?>
<?php
require 'db-connect.php';

$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

try {
    $stmt = $pdo->prepare("SELECT company_id, company_name FROM Companies WHERE company_name LIKE :term1 OR company_name_ruby LIKE :term2 LIMIT 10");
    $stmt->bindValue(':term1', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $stmt->bindValue(':term2', $searchTerm . '%', PDO::PARAM_STR);
    $stmt->execute();
    $companies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($companies);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$pdo = null;
?>