<?php
session_start();
require('db-connect.php');
$post_delete = $_POST['delete_input'] ?? [];
$delete_datas = array_values($post_delete);

$create_sheet = $_POST['CreateSheet'] ?? [];
$insert_step_ids = $_POST['insert_input'] ?? [];
$insert_sql = [];

// テスト用
$_SESSION['user']['student_number'] = "0000000";
if($create_sheet!=[]){
    try{
        $pdo->beginTransaction();
        $adopt_id_Max = $pdo->query("select max(adopt_id) as 'Max_ID' from adopt_state")->fetch();
        // インサートする際にadopt_idのAUTO_INCREMENTを解除したので注意
        // この場合、Maxを使用したInsertが必須となる
        $Adopt_State_Insert = "INSERT INTO adopt_state VALUES (?,?,?,?)";
        $NewSheetInsert = $pdo->prepare($Adopt_State_Insert);
        $NewSheetInsert->execute([$adopt_id_Max["Max_ID"]+1,$_SESSION['user']['student_number'],$_POST['company_name'],$_POST['NewNote']]);
        $Adopt_Detail_Insert = "INSERT INTO adopt_state_details VALUES (?,1,?,?)";
        $NewSheetDetailInsert = $pdo->prepare($Adopt_Detail_Insert);
        $NewSheetDetailInsert->execute([$adopt_id_Max["Max_ID"]+1,$_POST['AdoptWay'],$_POST['AdoptDate']]);
        $pdo->commit();
    }catch(Exception $e){
        $pdo->rollBack();
    }
}


// 追加されたかの判別
if($insert_step_ids!=[]){
    
    try{
        $pdo->beginTransaction();
        $sql = "SELECT COALESCE(MAX(adopt_step_id)+1,1) as 'next_id' FROM adopt_state_details WHERE adopt_id=?";
        $fetch_adopt_step_id = $pdo->prepare($sql);
        $fetch_adopt_step_id->execute([$_POST['adopt_id']]);
        $next_id = $fetch_adopt_step_id->fetch();
        $adopt_step_id = $next_id["next_id"];

        for($i = 0;$i<count($insert_step_ids);$i++){
            $insert_sql[] = "(".$_POST['adopt_id'].",".$adopt_step_id.",'','')";
            $adopt_step_id++;
        }
        $exe_sql = "INSERT INTO Adopt_State_Details VALUES ".implode(",",$insert_sql)."";
        $pdo->exec($exe_sql);
        $pdo->commit();
    }catch(Exception $e){
        $pdo->rollBack();
        echo json_encode(['status' => 'success', 'data' => "fail"]);
    }
    
}

// 削除されたかの判別
if($delete_datas!=[]){
    // 削除処理
    try{
        $pdo->beginTransaction();
        $post_id[] = $_POST['adopt_id'];
        $delete_datas_exe = array_merge($delete_datas,$post_id);
        $delete_placeholder = implode(',', array_fill(0, count($_POST['delete_input']), '?'));
        $delete_sql = "delete from adopt_state_details where adopt_step_id IN (".$delete_placeholder.") and adopt_id = ?";
        $set_query = $pdo->prepare($delete_sql);
        $set_query->execute($delete_datas_exe);
        $pdo->commit();
    }catch(Exception $e){
        $pdo->rollBack();
        echo json_encode(['status' => 'success', 'data' => "fail"]);
    }
    // 連番振り直し
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
}



// DB更新処理
    // ここのdatasのデータ数が削除数を考慮したものなら良い
    $datas = $_POST['ways'] ?? [];
    $adopt_way_case = [];
    $ids = [];
    $adopt_way_exe = [];
    for($i = 0; $i<count($datas); $i++){
        $adopt_way_case[] = "WHEN adopt_step_id = ? THEN ?";
        // INの中のプレースホルダ用
        $ids[] = $i+1;
        // ここはadopt_step_id用
        $adopt_way_exe[] = $i+1;
        // こっちはinputに入力したもの用
        $adopt_way_exe[] = $_POST['ways'][$i];

        // adopt_date用のCASE文を作成
        $adopt_date_case[] = "WHEN adopt_step_id = ? THEN ?";

        // ここはadopt_step_id用
        $date_exe[] = $i+1;

        // こっちはdateに入力したもの用
        $date_exe[] = $_POST['dates'][$i];
    }
    // adopt_wayのCASE文の中身を生成
    $adopt_way_increment = implode(" ", $adopt_way_case);

    // adopt_wayのCASE文の中身を生成
    $adopt_date_increment = implode(" ", $adopt_date_case);


    // adopt_step_idのリストをプレースホルダとして生成
    $placeholders = implode(',', array_fill(0, count($ids), '?'));

    // プレースホルダを含めた全体のSQL文を生成
    $sql = 'UPDATE adopt_state_details SET adopt_way = CASE ' . $adopt_way_increment . ' END, adopt_date = CASE '.$adopt_date_increment.' END WHERE adopt_step_id IN (' . $placeholders . ') AND adopt_id = ?';

    // adopt_way用のパラメータを結合
    $exe_value = array_merge($adopt_way_exe, $date_exe, $ids);

    $exe_value[] = $_POST['adopt_id'];

    // メモ内容のupdateSQLを発行
    $note_update_sql = "UPDATE adopt_state SET note = ? WHERE adopt_id = ?";

    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $update_select_state = $pdo->prepare($sql);
        $update_select_state->execute($exe_value);
        $update_note = $pdo->prepare($note_update_sql);
        $update_note->execute([$_POST['note_content'],$_POST['adopt_id']]);
        echo json_encode(['status' => 'success', 'data' => "test"]);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }

exit;