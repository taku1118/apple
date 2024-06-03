<?php
session_start();
require 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($password) || empty($confirm_password)) {
        echo "パスワードを入力してください。";
        exit;
    }

    if ($password !== $confirm_password) {
        echo "パスワードが一致しません。";
        exit;
    }

    // セッションからユーザーのIDを取得
    $student_number = $_SESSION['student_number'];

    // パスワードをハッシュ化
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // パスワードを更新
    $sql = "UPDATE Users SET password = :password WHERE student_number = :student_number";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':student_number', $student_number);

    if ($stmt->execute()) {
        echo "パスワードが変更されました。";
    } else {
        echo "パスワードの変更に失敗しました。";
    }

    // データベース接続を閉じる
    $pdo = null;
}
?>