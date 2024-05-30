<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テンプレート</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->

    <style>
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="content container-fluid">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
<style>
        .search-box {
            margin-top: 15px; /* テキストボックスの位置を調整 */
        }
        .card {
            margin-bottom: 20px; /* カード間の余白を設定 */
        }
        .col-lg-10 {
        flex: 0 0 auto;
        width: 100%;
        }
        .card-text {
            margin-bottom: 5px; 
        }
        .btn-sm{
            margin-right: 5px;
            margin-top: 5px;
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <form class="form-inline mb-3 search-box">
                    <input class="form-control form-control-lg w-100" type="search" placeholder="企業名を入力" aria-label="検索">
                </form>

                <div class="row">
                    <!-- 株式会社アウトソーシングテクノロジー -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body d-flex">
                                <img src="logo.png" alt="Logo" class="mr-3" width="50" height="50">
                                <div>
                                    <h4 class="card-title">
                                        <a href="https://www.ostechnology.co.jp/" target="_blank">株式会社アウトソーシングテクノロジー</a>
                                    </h4>
                                    <p class="card-text">業界 : 人材</p>
                                    <p class="card-text">本社所在地 : 東京都千代田区</p>
                                    <button class="btn btn-primary btn-sm">掲示板</button>
                                    <button class="btn btn-primary btn-sm">受験報告書一覧</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 株式会社フルアウト -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body d-flex">
                                <img src="logo.png" alt="Logo" class="mr-3" width="50" height="50">
                                <div>
                                    <h4 class="card-title">
                                        <a href="https://www.fullout.co.jp/" target="_blank">株式会社フルアウト</a>
                                    </h4>
                                    <p class="card-text">業界 : ソフトウェア・ハードウェア開発</p>
                                    <p class="card-text">本社所在地 : 東京都渋谷区</p>
                                    <button class="btn btn-primary btn-sm">掲示板</button>
                                    <button class="btn btn-primary btn-sm">受験報告書一覧</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 株式会社フリークアウト -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body d-flex">
                                <img src="logo.png" alt="Logo" class="mr-3" width="50" height="50">
                                <div>
                                    <h4 class="card-title">
                                        <a href="https://www.freakout.co.jp/" target="_blank">株式会社フリークアウト</a>
                                    </h4>
                                    <p class="card-text">業界 : ソフトウェア・ハードウェア開発</p>
                                    <p class="card-text">本社所在地 : 東京都港区</p>
                                    <button class="btn btn-primary btn-sm">掲示板</button>
                                    <button class="btn btn-primary btn-sm">受験報告書一覧</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 株式会社スペースアウト -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body d-flex">
                                <img src="logo.png" alt="Logo" class="mr-3" width="50" height="50">
                                <div>
                                    <h4 class="card-title">
                                        <a href="https://www.spaceout.co.jp/" target="_blank">株式会社スペースアウト</a>
                                    </h4>
                                    <p class="card-text">業界 : WEB・インターネット</p>
                                    <p class="card-text">本社所在地 : 東京都調布市</p>
                                    <button class="btn btn-primary btn-sm">掲示板</button>
                                    <button class="btn btn-primary btn-sm">受験報告書一覧</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
    <?php $pdo = null;?>
</body>
</html>