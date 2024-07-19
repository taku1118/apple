<?php session_start(); ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

    <!-- common.CSS -->
    <link href="../CSS/common.css" rel="stylesheet">


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
        }
        .thread {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .post {
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }
        .post:last-child {
            border-bottom: none;
        }
        .post-number {
            font-weight: bold;
        }
        .username {
            color: #0073e6;
            margin-right: 5px;
        }
        .date {
            color: #999;
        }
        .message {
            margin-top: 5px;
        }
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
<?php
$id = $_GET['company_id'];
$sql=$pdo->query("SELECT * FROM Post_Content where company_id = $id");
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <h3 class="mb-0 text-wrap"><?php echo $res[0]['thread_name']; ?></h3>
            </div>
            <form class="ms-auto d-flex">
                <button class="btn btn-secondary text-nowrap me-3" type="button" onclick="history.back()">戻る</button>
                <button class="btn btn-warning text-nowrap" type="submit">参加する</button>
            </form>
        </div>
    </nav>
<?php foreach($res as $row): ?>
    <div class="thread">
        <div class="post">
            <span class="post-number">
                <?= $row['post_id'] ?>
            </span> 
            名前：
            <a href="#" class="username dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $row['student_number'] ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="profile.php?student_number=<?= $row['student_number'] ?>">プロフィール</a></li>
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="chat_rooms_create('<?= $row['student_number'] ?>');">トーク</a></li>
            </ul> 
            投稿日：
            <span class="date">
                <?= $row['post_date'] ?>
            </span>
            <div class="message">
                <?= $row['post_content'] ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!----------------------------------------------------ここまで-------------------------------------------------------------------->
        </main>
    </div>

    <!-- jquery.Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- bootstrap.Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- sidebar.Script-->
    <script src="../SCRIPT/sidebars.js"></script>

    <script>
    function chat_rooms_create(student_number) {
    $.ajax({
        type: "POST",
        url: "chat_rooms_create.php",
        data: { other_student_number: student_number },
        success: function() {
            // チャットルームにリダイレクトする
            window.location.href = "chat-main.php";
        },
        error: function() {
            alert("チャットルームの作成に失敗しました。");
        }
    });
}
    </script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>