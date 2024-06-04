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
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <div class="navbar-brand">
                <h3 class="mb-0 text-wrap">株式会社アウトソーシングについて</h3>
            </div>
            <div class="ms-auto d-flex">
                <button class="btn btn-secondary text-nowrap me-3" onclick="history.back()">戻る</button>
                <button class="btn btn-warning text-nowrap" type="submit">参加する</button>
            </div>
        </div>
    </nav>
    <div class="thread">
        <div class="post">
            <span class="post-number">1</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:00:00</span>
            <div class="message">これはサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        <div class="post">
            <span class="post-number">2</span> 名前：<a href="#" class="username">名無しさん</a> 投稿日：<span class="date">2024/05/20(月) 10:05:00</span>
            <div class="message">これは別のサンプルの投稿です。</div>
        </div>
        
        <!-- 以下、投稿が続く -->
    </div>
<!----------------------------------------------------ここまで-------------------------------------------------------------------->
        </main>
    </div>

    <!-- jquery.Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- bootstrap.Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- sidebar.Script-->
    <script src="../SCRIPT/sidebars.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>