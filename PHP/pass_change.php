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
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
        <div style="margin-top: 10%;">
            <div class="card p-5" style="width: 55%;"><!--  カードの幅を調整したいときはwidthを編集 -->
                <h2>パスワード変更</h2>
                    <div class="mb-3" style="width:100%;">
                        <label for="formGroupExampleInput" class="form-label">パスワード</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="パスワード">
                    </div>
                    <div class="mb-3" style="width:100%;">
                        <label for="formGroupExampleInput2" class="form-label">パスワード確認</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="パスワード確認">
                    </div>
                    <div class="ms-auto">
                        <button class="btn btn-secondary" type="submit">キャンセル</button>　
                        <button class="btn btn-primary" type="submit">確定</button>
                    </div>
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