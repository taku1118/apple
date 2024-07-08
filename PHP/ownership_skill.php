<?php session_start(); ?>
<?php require 'judge.php'; ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="../CSS/reset.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>

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
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
    <div class="w-100">
        <div class="fs-1 ms-5 my-5">所有するスキル</div>
        <!-- <form action="./マイページ画面.html" method="post" class="gap-3 mt-3 form-inline"> -->
        <div class="card shadow-sm p-5 m-auto" style="width: 40rem;"><!-- ここからCard -->
            <div class="card-body p-2">
                <div class="card-text" id="card_area">
                    <div class="row my-1" id="input_area"> <!-- ここでFor文を回す -->
                        <div class="col-10">
                            <input type="text" name="licences[]" class="form-control">
                        </div>
                        <div class="col">
                            <button type="button" id="remove_input"
                                class="remove_input btn btn-outline-dark d-none">✕</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <button type="button" id="add_input" class="btn"><i class="bi bi-plus-circle"
                        style="font-size: 2rcap;"></i></button>
            </div>

        </div>
        <div class="mt-4" style="margin-left: 56%;">
            <button type="button" onclick="location.href='./my_page_screen.php'" class="btn btn-success btn-lg">変更する</button>
            <button type="button" onclick="location.href='./my_page_screen.php'"
                class="btn btn-secondary btn-lg">キャンセル</button>
        </div>
        <!-- </form> -->
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

    <!-- 入力欄 -->
    <script src="../SCRIPT/ownership_skill.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>