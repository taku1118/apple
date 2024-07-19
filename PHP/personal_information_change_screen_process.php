<?php
session_start();
require 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['user']['student_number'];
    
    $gender = $_POST['inlineRadioOptions'];
    $address = $_POST['address'];
    $birth = $_POST['birth-year'].$_POST['birth-month'].$_POST['birth-day'];
    $syu = $_POST['syuRadioOptions'];
    $nai = $_POST['naiRadioOptions'];

    $sql_txt='update Users set gender='.$gender.', address="'.$address.'", birthday='.$birth.', job_hunt='.$syu.', job_offer='.$nai.' where student_number = '.$id;
    $sql=$pdo->query($sql_txt);

    header("Location: my_page_screen.php");
    exit;
} else {
    echo "Invalid request method.";
}

$pdo = null;
?>