<?php
require 'db-connect.php';

$stmt = $pdo->query('SELECT * FROM Chat_Rooms ORDER BY room_created_date DESC');
$chat_rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($chat_rooms);
?>