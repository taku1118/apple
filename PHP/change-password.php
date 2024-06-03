<?php
session_start();
require 'db-connect.php';
// $test_query = $pdo->prepare(select student_number from Users where password = ?);
// $test_query->execute([$_POST['pass']]);
echo json_encode(["request" => [$_POST['pass']]]);
exit;