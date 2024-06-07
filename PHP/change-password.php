<?php
session_start();
require 'db-connect.php';
    $id = $_GET['id'];
    $test_query = $pdo->prepare("update Users set password = ? where student_number = $id");
    $test_query->execute([$_POST['pass']]);
    echo json_encode(["request" => [$_POST['pass']]]);  
exit;