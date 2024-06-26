<?php
session_start();
require ('db-connect.php');
    $pass=password_hash([$_POST['pass']], PASSWORD_DEFAULT);
    $sql=$pdo->prepare('update Users set password=? where student_number = ?');
    $sql->execute([$pass,$_SESSION['user']['student_number']]);
    echo json_encode(["request" => [$_POST['pass']]]);
exit;
// $test_query = $pdo->prepare("UPDATE users SET password = ? WHERE student_number = '0000000'");
//     $test_query->execute([$_POST['pass']]);