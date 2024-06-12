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

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>受験報告確認</title>
</head>
<body>
    <div class="container mt-5">
        <h1>受験報告確認</h1>
        <div class="mb-3">
            <label class="form-label">企業名</label>
            <p id="companyName"></p>
            
            <label class="form-label">受験日</label>
            <p id="examDate"></p>
            
            <label class="form-label">応募方法</label>
            <p id="applicationMethod"></p>
            
            <label class="form-label">試験内容</label>
            <p id="examContent"></p>
            
            <label class="form-label">質問内容</label>
            <p id="questionContent"></p>
            
            <label class="form-label">感想</label>
            <p id="impression"></p>
            
            <label class="form-label">備考</label>
            <p id="remarks"></p>
        </div>
        <button type="button" class="btn btn-primary" onclick="window.history.back();">戻る</button>
    </div>

</body>
</html>

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