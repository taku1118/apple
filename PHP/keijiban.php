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
    // スレッド情報を取得
    $thread_sql = $pdo->prepare("SELECT * FROM Thread WHERE company_id = ? AND is_active = 1");
    $thread_sql->execute([$id]);
    $thread = $thread_sql->fetch(PDO::FETCH_ASSOC);

    $post_sql = $pdo->prepare("SELECT * FROM Post WHERE thread_id = ? ORDER BY post_date ASC");
    $post_sql->execute([$thread['thread_id']]);
    $posts = $post_sql->fetchAll(PDO::FETCH_ASSOC);
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <h3 class="mb-0 text-wrap"><?php echo $thread['thread_name']; ?></h3>
            </div>
            <div class="ms-auto d-flex">
                <button class="btn btn-secondary text-nowrap me-3" type="button" onclick="history.back()">戻る</button>
                <button class="btn btn-warning text-nowrap" type="button" data-bs-toggle="modal" data-bs-target="#postModal">コメントする</button>
    </div>
        </div>
    </nav>
    <!-- 投稿モーダル -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">新しい投稿</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="postForm">
                        <div class="mb-3">
                            <label for="postContent" class="form-label">投稿内容</label>
                            <textarea class="form-control" id="postContent" name="postContent" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">投稿する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php foreach($posts as $row): ?>
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
            <li><a class="dropdown-item" href="javascript:void(0);" onclick="chat_rooms_create('<?= $_SESSION['user']['student_number'] ?>','<?= $row['student_number'] ?>');">トーク</a></li>
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
    function chat_rooms_create(my_student_number,student_number) {
        if(student_number != my_student_number){
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
        }else{
                alert("自分です。");
        } 
    }
    // 投稿フォームの送信処理
    $(document).ready(function() {
        $('#postForm').on('submit', function(event) {
            event.preventDefault();
            const postContent = $('#postContent').val();

            $.ajax({
                type: "POST",
                url: "insert_post.php",
                data: {
                    thread_id: <?= $thread['thread_id'] ?>,
                    postContent: postContent
                },
                success: function() {
                    location.reload();
                },
                error: function() {
                    alert("投稿に失敗しました。");
                }
            });
        });
    });
    </script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>