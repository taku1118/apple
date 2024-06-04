<?php
session_start();
require 'db-connect.php';
$test_query = $pdo->prepare(update Users set password = ? where student_number = '0000000');
$test_query->execute([$_POST['pass']]);
echo json_encode(["request" => [$_POST['pass']]]);
exit;