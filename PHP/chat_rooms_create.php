<?php
session_start();
require 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_SESSION['user']['student_number']; 
    $other_student_number = $_POST['other_student_number'];

    // チャットルームが既に存在するか確認
    $stmt = $pdo->prepare("
        SELECT cr.chat_room_id 
        FROM Chat_Rooms cr 
        JOIN Chat_Room_Participants crp1 ON cr.chat_room_id = crp1.chat_room_id
        JOIN Chat_Room_Participants crp2 ON cr.chat_room_id = crp2.chat_room_id
        WHERE crp1.student_number = ? AND crp2.student_number = ?
    ");
    $stmt->execute([$student_number, $other_student_number]);
    $chat_room = $stmt->fetch(PDO::FETCH_ASSOC);
    $name1stmt = $pdo->prepare("SELECT user_name,nickname FROM Users WHERE student_number = ?");
    $name1stmt->execute([$student_number]);
    $name1=$name1stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($name1['nickname'])){
        $name1txt=$name1['nickname'];
    }else{
        $name1txt=$name1['user_name'];
    }
    $name2stmt = $pdo->prepare("SELECT user_name,nickname FROM Users WHERE student_number = ?");
    $name2stmt->execute([$other_student_number]);
    $name2=$name2stmt->fetch(PDO::FETCH_ASSOC);
    if(!empty($name2['nickname'])){
        $name2txt=$name2['nickname'];
    }else{
        $name2txt=$name2['user_name'];
    }
    if ($chat_room) {
        // チャットルームが存在する場合
        $chat_room_id = $chat_room['chat_room_id'];
    } else {
        // チャットルームを作成
        $stmt = $pdo->prepare("INSERT INTO Chat_Rooms (chat_room_title) VALUES (?)");
        $stmt->execute([$name1txt . ' and ' . $name2txt]);
        $chat_room_id = $pdo->lastInsertId();

        // チャットルームにユーザーを参加させる
        $stmt = $pdo->prepare("INSERT INTO Chat_Room_Participants (chat_room_id, student_number) VALUES (?, ?)");
        $stmt->execute([$chat_room_id, $student_number]);
        $stmt->execute([$chat_room_id, $other_student_number]);
    }

    // チャットルームページにリダイレクト
    header("Location: chat-main.php");
    exit;
} else {
    echo "Invalid request method.";
}

$pdo = null;
?>
