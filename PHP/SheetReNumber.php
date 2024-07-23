<?php
session_start();
require('db-connect.php');

try{
    $pdo->beginTransaction();

        $sql = "SELECT adopt_step_id FROM adopt_state_details WHERE adopt_id=?";
        $step_id_num = $pdo->prepare($sql);
        $step_id_num->execute([$_POST['adopt_id']]);
        $old_ids = $step_id_num->fetchAll();
        $new_id = 1;
        foreach($old_ids as $old_id){
            $renumber_sequence = $pdo->prepare("UPDATE adopt_state_details SET adopt_step_id = ? WHERE adopt_id = ? AND adopt_step_id = ?");
            $renumber_sequence->execute([$new_id,$_POST['adopt_id'],$old_id['adopt_step_id']]);
            $new_id++;
        }
    $pdo->commit();
}catch(Exception $e){
    $pdo->rollBack();
    echo json_encode(['status' => 'success', 'data' => "fail"]);
}

echo json_encode(['status' => 'error', 'data' => "success"]);

exit;