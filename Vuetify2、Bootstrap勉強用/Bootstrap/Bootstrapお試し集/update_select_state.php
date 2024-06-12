<?php
require('../../../PHP/db-connect.php');

$datas = $_POST['ways'] ?? [];
$case = [];
$ids = [];
$exe_value = [];
for($i = 0; $i<count($datas); $i++){
    $case[] = "WHEN adopt_step_id = ? THEN ?";
    $ids[] = $i+1;
    $exe_value[] = $i+1;
    $exe_value[] = $_POST['ways'][$i];
}

// CASE文の中身を生成
$increment_case = implode(" ", $case);

// adopt_step_idのリストをプレースホルダとして生成
$placeholders = implode(',', array_fill(0, count($ids), '?'));

// プレースホルダを含めた全体のSQL文を生成
$sql = 'UPDATE adopt_state_details SET adopt_way = CASE ' . $increment_case . ' END WHERE adopt_step_id IN (' . $placeholders . ') AND adopt_id = ?';

// 全てのパラメータを結合
$exe_value = array_merge($exe_value, $ids);
$exe_value[] = $_POST['adopt_id'];

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $update_select_state = $pdo->prepare($sql);
    $update_select_state->execute($exe_value);
    echo json_encode(['status' => 'success', 'data' => $increment_case]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
exit;