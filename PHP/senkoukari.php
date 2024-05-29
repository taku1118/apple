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
          
    .background-image{
        background-image: url("../IMAGE/kaisya.jpeg");
        background-size: cover;
        height: 150px;
        width:1000px;
        padding-left:0px;   }
   
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="content container-fluid" style="padding: 0;">
         <!-- サイドバーとメインコンテンツのラッパー -->
    
         
            <div class="background-image">
                <h1>選考状況</h1>

            </div>
    

       
    <div class="container-fluid">
   
        
   
            <!-- Main content -->
            <div class="mt-4">
                <form class="form-inline">

                    <input type="text" class="form-control" style="width: 95%;" placeholder="キーワードで検索">

                    <button class="btn shadow btn-primary">検索</button>

                </form>

                <div class="d-flex justify-content-start w-75 mb-4">
                    <button class="btn shadow btn-primary">+ 追加</button>
                </div>
                <div class="card-deck w-75">
                    <!-- Card 1 -->
                    <form action="#">
                    <button class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title">株式会社〇〇〇〇〇〇</h5>
                            <div class="status">
                                <p>1次: エントリーシート <span class="text-muted">締切 3/9</span></p>
                                <p>2次: グループ面接 <span class="text-muted">締切 4/5</span></p>
                            </div>
                            <textarea class="form-control" rows="2" placeholder="メモ"></textarea>
                        </div>
                    </button>
                    </form>
                    <!-- Card 2 -->
                    <form action="#">
                    <button class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title">株式会社〇〇〇〇〇〇</h5>
                            <div class="status">
                                <p>1次: エントリーシート <span class="text-muted">締切 3/9</span></p>
                                <p>2次: 面接 <span class="text-muted">日付 4/5</span></p>
                            </div>
                            <textarea class="form-control" rows="2" placeholder="メモ"></textarea>
                        </div>
                    </button>
                    </form>
                </div>
            </div>
        <!-- </div> -->
    </div>
<
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
   
  