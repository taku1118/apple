<?php
session_start();
// DB接続 
require 'db-connect.php';

// joinを使ったviewを作るとupdataできない
    $id = $_SESSION['user']['student_number'];
    $sql_txt='update Users set desire_state_prefecture='.$_POST["prefecture"].', desire_state_industry='.$_POST["industry"].', desire_state_jobtype='.$_POST["jobtype"].' where student_number = '.$id;
    $sql=$pdo->query($sql_txt);

    header("Location: my_page_screen.php");
    exit;

$pdo = null;
?>