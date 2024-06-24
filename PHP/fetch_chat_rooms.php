<?php session_start(); ?>
<?php
require 'db-connect.php';
$student_number=$_SESSION['user']['student_number'];
$stmt = $pdo->prepare('SELECT * FROM Chat_Rooms AS A INNER JOIN (
SELECT * FROM Chat_Room_Participants where student_number = ?) AS B ON A.chat_room_id =B.chat_room_id ORDER BY participation_date ASC');
$stmt->execute([$student_number]);
$chat_rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($chat_rooms);
?>