<?php session_start(); ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>

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
    .background-image{
        background-image: url("../IMAGE/school.jpg");
        background-size: cover;
        height: 200px;
        width:100%;
    }

    #company-name-search-form{
        padding: 0 3rem;
        width: 100%;
        height: 3rem;
    }

    #company-name-search-form button{   
        padding: 0 1.3rem;
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<h1 class="page_title">麻生就職サポート</h1>
<br>
<form action="mypage.php" method="post" id="check_form">
    <div class="centered_input_wide">
        <p>ログインID</p>
        <input type="text" class="form-control" id="loginID" name="loginID" required>

        <p>パスワード</p>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">ログイン</button>
</form>

<p class="has-text-danger" id="check_input"></p>

<!----------------------------------------------------ここまで-------------------------------------------------------------------->
</main>
</div>

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