<?php
session_start();
require 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_SESSION['user']['student_number'];
    $thread_id = $_POST['thread_id'];
    $post_content = $_POST['postContent'];

    // 新しい投稿IDを計算
    $stmt = $pdo->prepare("SELECT COALESCE(MAX(post_id) + 1, 1) AS new_post_id FROM Post WHERE thread_id = ?");
    $stmt->execute([$thread_id]);
    $new_post_id = $stmt->fetchColumn();

    // 新しい投稿を挿入
    $stmt = $pdo->prepare("INSERT INTO Post (thread_id, post_id, student_number, post_date, post_content) VALUES (?, ?, ?, CURRENT_TIMESTAMP(), ?)");
    $stmt->execute([$thread_id, $new_post_id, $student_number, $post_content]);

    echo "success";
} else {
    echo "Invalid request method.";
}

$pdo = null;
?>