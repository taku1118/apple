<!doctype html>
<html lang="ja" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />

    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

    <!-- bootstrapのアイコン -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>

    </style>

</head>

<body>
    <?php
        $personal_items = ["性別","現住所","生年月日","卒業予定年月","学校名","学科","就活状況","内定有無"];
        
    ?>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
        <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
            <!----------------------------------------------------ここから-------------------------------------------------------------------->
            <div class="row w-100 m-5">
                <div class="col">
                    <span class="fs-1 d-inline-block" style="width: 68%;">あなたの情報</span>
                    <a href="./personal_information_change_screen.html" class="icon-link icon-link-hover fs-5 text-decoration-none" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                        <i class="bi bi-pencil-square mb-1"></i>
                        編集
                    </a>
                    <div class="card shadow-sm" style="width: 35rem;"><!-- ここからCard -->
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-4">
                                        <span class="fs-4">性別</span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">男性</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <span class="fs-4">現住所</span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">福岡</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <span class="fs-4">生年月日</span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">2024年4月25日</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <span class="fs-4"></span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">2025年3月</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <span class="fs-4">学校名</span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">麻生情報ビジネス専門学校</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <span class="fs-1 d-inline-block" style="width: 50%;">所有スキル</span>
                    <a href="./ownership_skill.html" class="icon-link icon-link-hover fs-5 text-decoration-none" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                        <i class="bi bi-pencil-square mb-1"></i>
                        編集
                    </a>
                    <div class="card shadow-sm" style="width: 27rem;">
                        <div class="card-body">
                            <p class="card-text">
                            <p class="fs-4">基本情報技術者試験</p>
                            <p class="fs-4">普通免許</p>
                            <p class="fs-4">サーティファイ主催Java　二級</p>
                            <p class="fs-4">TOEIC</p>

                        </div>
                    </div>
                </div>
                <div class="col my-4">
                    <span class="fs-1 d-inline-block w-50">希望する条件</span>
                    <a href="./suggested_condition.html" class="icon-link icon-link-hover fs-5 text-decoration-none" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                        <i class="bi bi-pencil-square mb-1"></i>
                        編集
                    </a>
                    <div class="card shadow-sm" style="width: 29rem;">
                        <div class="card-body">
                            <div class="card-text">
                                <div class="row"> <!-- ここでFor文を回す -->
                                    <div class="col">
                                        <span class="fs-4">希望する勤務地</span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">福岡</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <span class="fs-4">希望する業界</span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">ソフトウェア</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <span class="fs-4">希望する職種</span>
                                    </div>
                                    <div class="col">
                                        <span class="fs-4">プログラマ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Cardはここまで -->
                </div>
                <div class="col-sm-6 my-5">
                    <div class="card shadow-sm" style="width: 29rem;">
                        <h5 class="card-header fs-1">個人設定</h5>
                        <div class="card-body">
                            <div class="card-text">
                                <a href="#" class="icon-link icon-link-hover fs-5 text-decoration-none d-block" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                                    <span class="fs-4">プロフィール変更</span>
                                </a>
                                <a href="#" class="icon-link icon-link-hover fs-5 text-decoration-none d-block" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                                    <span class="fs-4">パスワード変更</span>
                                </a>
                                <a href="#" class="icon-link icon-link-hover fs-5 text-decoration-none d-block" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                                    <span class="fs-4">ログアウト</span>
                                </a>
                            </div>
                        </div>
                    </div> <!-- Cardはここまで -->
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

    <!-- DB切断 -->
    <?php $pdo = null; ?>
</body>

</html>