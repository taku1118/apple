<?php
require 'db-connect.php';
$pass=password_hash('test', PASSWORD_DEFAULT);
$sql=$pdo->prepare('update Users set password=? where student_number = ?');
$sql->execute([$pass,'0000000']);
?>