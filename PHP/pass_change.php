<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テンプレート</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <style>
        #textPassword {
            border: none; /* デフォルトの枠線を消す */
        }
    </style>

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>
    <?php session_start(); ?>
    <?php $sql=$pdo->query("SELECT password FROM users where student_number = '0000000'"); ?>

</head> 
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
        <div style="margin-top: 10%;">
            <div class="card p-5 m-auto" style="width: 55%;"><!--  カードの幅を調整したいときはwidthを編集 -->
                <h2>パスワード変更</h2>
                <form action="my_page_screen.php" method="post" style="display: inline-block;">
                    <div class="mb-3" style="width:100%;">
                        <label for="formGroupExampleInput" class="form-label">パスワード</label>
                        <input type="password" class="form-control" id="formGroupExampleInput" maxlength="224" placeholder="パスワード">
                        <span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>
                    </div>
                    <div class="mb-3" style="width:100%;">
                        <label for="formGroupExampleInput2" class="form-label">パスワード確認</label>
                        <input type="password" class="form-control" id="formGroupExampleInput2" name="confirm_password" maxlength="224" placeholder="パスワード確認">
                        <span id="buttonEye2" class="fa fa-eye" onclick="pushHideButton()"></span>
                    </div>
                    <div class="ms-auto">
                        <button class="btn btn-secondary" type="button" onclick="history.back()">キャンセル</button>　
                        <button class="btn btn-primary" id="change_confirm" type="button">確定</button>
                    </div>
                </form>
            </div>  
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

    <!-- pass_change.js-->
    <script src="../SCRIPT/pass_change.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>