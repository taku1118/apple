<?php
    // $update_select_state = $pdo->prepare('UPDATE Adopt_State_Details SET 
    // adopt_way = ELT(FIELD(adopt_step_id,?),?), 
    // adopt_date = ELT(FIELD(adopt_step_id,1,2,3),CURRENT_DATE(),CURRENT_DATE(),CURRENT_DATE())  
    // WHERE adopt_step_id IN (1,2,3) AND adopt_id = ?');

    require('../../../PHP/db-connect.php');
    $array_ways = array_values($_POST['ways']);
    $array_key = array_keys($array_ways);  // 連番を1から振るにはどうしたら？
    $query_ways = implode(",",$array_ways);
    $adopt_step = implode(",",$array_key);
    // $update_select_state = $pdo->prepare('UPDATE Adopt_State_Details SET 
    // adopt_way = ELT(FIELD(adopt_step_id,?),?)
    // WHERE adopt_step_id IN (?) AND adopt_id = ?');
    // $update_select_state->execute([$adopt_step,$array_ways,$adopt_step,$_POST['adopt_id']]);
    // レスポンスを返す
    
    echo json_encode(['status' => 'success', 'data' => $query_ways]);
?>