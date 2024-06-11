<?php
require('../../../PHP/db-connect.php');
$case = [];
$ids = [];
$exe_value = [];
$data = $_POST['adopt_id'];
// for($i = 0; $i<count($_POST['ways']); $i++){
//     $case[] = "WHEN adopt_step_id = ? THEN ?";
//     $ids[] = $i+1;
//     $exe_value[] = $i+1;
//     $exe_value[] = '"'.$_POST['ways'][$i].'"';
// }
// $increment_case = implode(" ",$case);
// $exe_ids = implode(",",$ids);
// $exe_str = implode(',',$exe_value);
// try {
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $update_select_state = $pdo->prepare('UPDATE adopt_state_details SET adopt_way = CASE '.$increment_case.' END WHERE adopt_step_id IN (?) AND adopt_id = ?');
//     $update_select_state->execute([$increment_case,$exe_str,$exe_ids,$_POST['adopt_id']]);
// } catch (PDOException $e) {
//     // レスポンスを返す
//     echo json_encode(['status' => 'success', 'data' => $increment_case]);
// }
echo json_encode(['status' => 'success', 'data' => $data]);
exit;