<?php session_start(); ?>
<?php require 'judge.php'; ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード変更画面</title>

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

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>

    <style>
        #textPassword {
            border: none; /* デフォルトの枠線を消す */
        }
        .font{
        color: rgb(45, 55, 64);
        font-weight: bold;
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
        <div class="d-flex justify-content-center align-items-center" style="height:100%;width:100%;">
            <div class="card shadow p-5" style="width: 90%;min-width:320px;max-width:640px;"><!--  カードの幅を調整したいときはwidthを編集 -->
                <h2 class="font">パスワード変更</h2>
                <form action="my_page_screen.php" method="post">
                    <label for="formGroupExampleInput" class="form-label">新しいパスワード</label>
                    <div class="mb-3 position-relative">
                        <input type="password" class="form-control" id="formGroupExampleInput" placeholder="パスワード">
                        <i id="eyeIcon" class="bi bi-eye-slash translate-middle position-absolute top-50 end-0"></i>
                    </div>
                    <label for="formGroupExampleInput2" class="form-label">パスワード確認</label>
                    <div class="mb-3 position-relative">
                        <input type="password" class="form-control" id="formGroupExampleInput2" name="confirm_password" placeholder="パスワード確認">
                        <i id="eyeIcon2" class="bi bi-eye-slash translate-middle position-absolute top-50 end-0"></i>  
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-secondary" href="my_page_screen.php">キャンセル</a>
                        <button class="btn btn-primary ms-3" id="change_confirm" type="button">確定</button>
                    </div>
                </form>
            </div>  
        </div>
<!----------------------------------------------------ここまで-------------------------------------------------------------------->
            <!-- スマホレイアウトでのfooter、戻るなどで見えなくなるため-->
            <div class="d-md-none copyright">
                @ 2024 AppleChupachups
            </div>
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

    <!-- pass_change.js-->
    <script src="../SCRIPT/pass_change.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>