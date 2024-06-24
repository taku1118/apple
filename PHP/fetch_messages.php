<?php
session_start();
require 'db-connect.php';

if (isset($_GET['chat_room_id'])) {
    $chat_room_id = $_GET['chat_room_id'];

    // プロフィール画像を含むメッセージを取得
    $stmt = $pdo->prepare('
        SELECT 
            m.message_id,
            m.chat_room_id,
            m.send_by,
            m.message,
            m.message_created_date,
            u.profile_img  -- ユーザーのプロフィール画像を取得
        FROM 
            Chat_Room_Messages AS m
        JOIN 
            Users AS u ON m.send_by = u.student_number
        WHERE 
            m.chat_room_id = ?
        ORDER BY 
            m.message_created_date ASC
    ');
    $stmt->execute([$chat_room_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($messages);
}
?>