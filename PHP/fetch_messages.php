<?php
require 'db-connect.php';

if (isset($_GET['chat_room_id'])) {
    $chat_room_id = $_GET['chat_room_id'];
    $stmt = $pdo->prepare('SELECT * FROM Chat_Room_Messages WHERE chat_room_id = ? ORDER BY message_created_date ASC');
    $stmt->execute([$chat_room_id]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($messages);
}
?>