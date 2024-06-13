<?php
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['chat_room_id'])) {
    $message = $_POST['message'];
    $chat_room_id = $_POST['chat_room_id'];
    $send_by = '0000001'; // セッションなどで管理することを推奨

    if (!empty($message) && !empty($chat_room_id)) {
        $stmt = $pdo->prepare('INSERT INTO Chat_Room_Messages (chat_room_id, send_by, message) VALUES (?, ?, ?)');
        $stmt->execute([$chat_room_id, $send_by, $message]);
    }
}
?>