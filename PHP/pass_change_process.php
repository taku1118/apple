<?php
session_start();
require ('db-connect.php');
if(strlen($_POST['pass']) > 4) {
    echo "文字数がオーバーしています。";
}else if (preg_match("/^[a-zA-Z0-9]+$/", $_POST['pass'])) {
    $pass=password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $sql=$pdo->prepare('update Users set password=? where student_number = ?');
    $sql->execute([$pass,$_SESSION['user']['student_number']]);
    echo json_encode(["request" => [$_POST['pass']]]);
}else {
    echo "すべて半角英数ではない";
}
exit;
// $test_query = $pdo->prepare("UPDATE Users SET password = ? WHERE student_number = '0000000'");
// $test_query->execute([$_POST['pass']]);
?>