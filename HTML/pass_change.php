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
<div class="card">
    <h2 class="center-block">パスワード変更</h2>
    <div class="mb-3 w-50">
        <label for="formGroupExampleInput" class="form-label">パスワード</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="パスワード">
      </div>
      <div class="mb-3 w-50">
        <label for="formGroupExampleInput2" class="form-label">パスワード確認</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="パスワード確認">
      </div>
      <div class="text-right">
      　　　　　　　　　　　　　　　　　　　　<button class="btn btn-secondary" type="submit">キャンセル</button>　
      <button class="btn btn-primary" type="submit">確定</button>
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