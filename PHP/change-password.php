<?php
session_start();
require ('db-connect.php');
    $user_id = "0000000";
    $test_query = $pdo->prepare("UPDATE users SET password = ? WHERE student_number = '0000000'");
    $test_query->execute([$_POST['pass']]);
    echo json_encode(["request" => [$_POST['pass']]]);
exit;