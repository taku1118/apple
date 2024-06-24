<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
unset($_SESSION['user']);
$sql=$pdo->prepare('select * from Users where student_number = ?');
$sql->execute([$_POST['student-number']]);
foreach($sql as $row) {
    if(password_verify($_POST['password'],$row['password'])){
        $_SESSION['user']=[
            'student_number'=>$row['student_number'],
            'user_name'=>$row['user_name'],
            'password'=>$_POST['password'],
            'nickname'=>$row['nickname'],
            'profile_img'=>$row['profile_img'],
        ];
    }
}
if(isset($_SESSION['user'])){
header('Location:top.php');
exit();    
}else{
header('Location:login.php?hogeA=ログイン名またはパスワードが違います');
exit();
}
?>
