<?php
require('db-connect.php');
$post_delete = $_POST['delete_input'] ?? [];
$delete_datas = array_values($post_delete);

// インサート処理
$insert_step_ids = $_POST['insert_input'] ?? [];
$insert_sql = [];
if($insert_step_ids!=[]){
    
    try{
        $pdo->beginTransaction();
        // $sql = "SELECT COALESCE(MAX(adopt_step_id)+1,1) as 'next_id' FROM adopt_state_details WHERE adopt_id=?";
        // $fetch_adopt_step_id = $pdo->prepare($sql);
        // $fetch_adopt_step_id->execute([$_POST['adopt_id']]);
        // $next_id = $fetch_adopt_step_id->fetch();
        // $adopt_step_id = $next_id["next_id"];

        for($i = 0;$i<count($insert_step_ids);$i++){
            $insert_sql[] = "(".$_POST['adopt_id'].",".$_POST['insert_input'][$i].",'','')";
        }
        $exe_sql = "INSERT INTO Adopt_State_Details VALUES ".implode(",",$insert_sql)."";
        $pdo->exec($exe_sql);
        $pdo->commit();
    }catch(Exception $e){
        // エラーが発生した場合、トランザクションを取り消す
        $pdo->rollBack();
    }
    
}

// 削除処理
if($delete_datas!=[]){

// 指定inputを削除する
    try{
        $pdo->beginTransaction();
        $delete_placeholder = implode(',', array_fill(0, count($_POST['delete_input']), '?'));
        $delete_sql = "delete from adopt_state_details where adopt_step_id IN (".$delete_placeholder.")";
        $set_query = $pdo->prepare($delete_sql);
        $set_query->execute($delete_datas);
        $pdo->commit();
    }catch(Exception $e){
        // エラーが発生した場合、トランザクションを取り消す
        $pdo->rollBack();
    }

// 連番を振り直す
    try{
        // $pdo->beginTransaction();
        // // adopt_step_idの数を取得
        //     $sql = "SELECT count(adopt_step_id) as 'step_id_count' FROM adopt_state_details WHERE adopt_id=?";
        //     $step_id_num = $pdo->prepare($sql);
        //     $step_id_num->execute([$_POST['adopt_id']]);
        //     // データベースからとってきたstep_id
        //     // step_idと$_POST['adopt_step_ids']の個数を合わせる必要があるのでは？
        //     $ids_count = $step_id_num->fetch();
        // 連番を振り直す
            // for($i = 1;$i<=$ids_count['step_id_count']; $i++){
            //     $renumber_sequence = $pdo->prepare("UPDATE adopt_state_details SET adopt_step_id = ? WHERE adopt_id = ? AND adopt_step_id = ?");

            //     $renumber_sequence->execute([$i,$_POST['adopt_id'],$_POST['adopt_step_ids'][$i-1]]);
            // }
        // $pdo->commit();
    }catch(Exception $e){
        // エラーが発生した場合、トランザクションを取り消す
        // $pdo->rollBack();
    }
}




// DB更新処理
    // ここのdatasのデータ数が削除数を考慮したものなら良い
    // $datas = $_POST['ways'] ?? [];
    // $case = [];
    // $ids = [];
    // $exe_value = [];
    // for($i = 0; $i<count($datas); $i++){
    //     $case[] = "WHEN adopt_step_id = ? THEN ?";
    //     // INの中のプレースホルダ用
    //     $ids[] = $i+1;
    //     // ここはadopt_step_id用
    //     $exe_value[] = $i+1;
    //     // こっちはinputに入力したもの用
    //     $exe_value[] = $_POST['ways'][$i];
    // }
    // // CASE文の中身を生成
    // $increment_case = implode(" ", $case);

    // // adopt_step_idのリストをプレースホルダとして生成
    // $placeholders = implode(',', array_fill(0, count($ids), '?'));

    // // プレースホルダを含めた全体のSQL文を生成
    // $sql = 'UPDATE adopt_state_details SET adopt_way = CASE ' . $increment_case . ' END WHERE adopt_step_id IN (' . $placeholders . ') AND adopt_id = ?';

    // // 全てのパラメータを結合
    // $exe_value = array_merge($exe_value, $ids);
    // $exe_value[] = $_POST['adopt_id'];

    // try {
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $update_select_state = $pdo->prepare($sql);
    //     $update_select_state->execute($exe_value);
    //     echo json_encode(['status' => 'success', 'data' => $delete_datas]);
    // } catch (PDOException $e) {
    //     echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    // }
    echo json_encode(['status' => 'success', 'data' => $insert_step_ids]);
exit;