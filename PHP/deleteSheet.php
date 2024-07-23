<?php
session_start();
require('db-connect.php');

try{
    $pdo->beginTransaction();
    $pdo->prepare("DELETE FROM adopt_state_details WHERE adopt_id = ?")->execute([$_POST['DeleteSheet']]);
    $pdo->prepare("DELETE FROM adopt_state WHERE adopt_id = ?")->execute([$_POST['DeleteSheet']]);
    $pdo->commit();
}catch(Exception $e){
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'data' => "fail"]);
}

echo json_encode(['status' => 'error', 'data' => "success"]);

exit;