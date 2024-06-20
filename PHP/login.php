<?php session_start(); ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="../CSS/reset.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

    <!-- common.CSS -->
    <link href="../CSS/common.css" rel="stylesheet">

    <style>
    
    </style>

</head>
<body>
<!----------------------------------------------------ここから-------------------------------------------------------------------->
    <?php unset($_SESSION['user']); ?>
    <div class="container mt-5">
        <h1>麻生就職サポート</h1>
        <form action="login-process.php" method="post">
            <div class="mb-3">
                <label for="loginID" class="form-label">学籍番号</label>
                <input type="text" class="form-control" id="student-number" name="student-number" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- ログイン処理に失敗した場合 -->
            <?php
            if(isset($_GET['hogeA'])){
                echo '<p class="text-danger mb-3">',$_GET['hogeA'],'</p>';
            }else{
                echo '<p class="text-danger mb-3"><br></p>';
            }
            ?>
            <button type="submit" class="btn btn-primary">ログイン</button>
        </form>
    </div>
<!----------------------------------------------------ここまで-------------------------------------------------------------------->
    <!-- jquery.Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- bootstrap.Script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- sidebar.Script-->
    <script src="../SCRIPT/sidebars.js"></script>

    <!-- common.Script-->
    <script src="../SCRIPT/common.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>