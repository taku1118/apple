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
    .wrapper{
        height:100vh;
        width:100vw;
        display: flex;
        justify-content:center;
        align-items:center;
    }
    </style>

</head>
<body>
<!----------------------------------------------------ここから-------------------------------------------------------------------->
    <?php unset($_SESSION['user']); ?>
    <div class="wrapper">
        <form action="login-process.php" method="post" class="d-flex flex-column" style="height:50vh;width:50vw;min-width:240px;">
            <h1 class="mb-0">麻生就職サポート</h1>
            <!-- ログインしていない場合 -->
            <div class="flex-grow-1 align-content-center">
            <?php
            if(isset($_GET['hogeB'])){
                echo '<p class="text-danger mb-0">',$_GET['hogeB'],'</p>';
            }else{
                echo '<p class="text-danger mb-0"><br></p>';
            }
            ?>
            </div>
            <div class="flex-grow-1 align-content-center">
                <label for="student-number" class="form-label">学籍番号</label>
                <input type="text" class="form-control" id="student-number" name="student-number" required>
            </div>
            <div class="flex-grow-1 align-content-center">
                <label for="password" class="form-label">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- ログイン処理に失敗した場合 -->
            <div class="flex-grow-1 align-content-center">
            <?php
            if(isset($_GET['hogeA'])){
                echo '<p class="text-danger mb-0">',$_GET['hogeA'],'</p>';
            }else{
                echo '<p class="text-danger mb-0"><br></p>';
            }
            ?>
            </div>
            <div class="flex-grow-1 align-content-center">
                <button type="submit" class="btn btn-primary" style="width:100%;height:2.5rem;">ログイン</button>
            </div>
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