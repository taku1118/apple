<?php
    const SERVER = 'localhost';
    const DBNAME = 'mysqlspring';
    const USER = 'root';
    const PASS = 'root';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
    $pdo=new PDO($connect, USER, PASS);

    if($pdo){
    }else{  
      echo "データベースに接続できません";
      exit;
    }
    $sql=$pdo->query('select * from member');
 
    if($sql->rowCount() == 0){
      echo "レコードが有りません";
    }else{
      foreach ($sql as $row) {
          $data[] = $row;
      } 
    }
    //値をjson形式で出力
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>