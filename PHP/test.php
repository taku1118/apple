<?php session_start(); ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>受験報告作成</title>

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
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
<div class="container mt-3 mb-3">
        <h1>受験報告作成</h1>
        <form id="reportForm" onsubmit="return submitForm()" class="card p-3">
            <div class="mb-3">
                <label for="companyName" class="form-label">企業名</label>
                <input type="text" class="form-control" id="companyName" required>
            </div>
            <div class="mb-3">
                <label for="examDate" class="form-label">受験日</label>
                <input type="date" class="form-control" id="examDate" required>
            </div>
            <div class="mb-3">
                <label for="applicationMethod" class="form-label">応募方法</label>
                <select class="form-select" id="applicationMethod" required>
                    <option value="学校求人">学校求人</option>
                    <option value="自己開拓">自己開拓</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="examContent" class="form-label">試験内容</label>
                <select class="form-select" id="examContent" required>
                    <option value="個人面接">個人面接</option>
                    <option value="集団面接">集団面接</option>
                    <option value="面談">面談</option>
                    <option value="筆記試験">筆記試験</option>
                    <option value="実技試験">実技試験</option>
                    <option value="インターン">インターン</option>
                    <option value="その他">その他</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="questionContent" class="form-label">質問内容</label>
                <textarea class="form-control" id="questionContent" required></textarea>
            </div>
            <div class="mb-3">
                <label for="impression" class="form-label">感想</label>
                <textarea class="form-control" id="impression" required></textarea>
            </div>
            <div class="mb-3">
                <label for="remarks" class="form-label">備考</label>
                <textarea class="form-control" id="remarks"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">確認</button>
        </form>
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

    <!-- common.Script-->
    <script src="../SCRIPT/common.js"></script>

    <script>
        function submitForm() {
            // フォームの値を取得
            const companyName = document.getElementById('companyName').value;
            const examDateYear = document.getElementById('examDateYear').value;
            const examDateMonth = document.getElementById('examDateMonth').value;
            const examDateDay = document.getElementById('examDateDay').value;
            const examDate = `${examDateYear}-${examDateMonth}-${examDateDay}`;
            const applicationMethod = document.getElementById('applicationMethod').value;
            const examContent = document.getElementById('examContent').value;
            const questionContent = document.getElementById('questionContent').value;
            const impression = document.getElementById('impression').value;
            const remarks = document.getElementById('remarks').value;

            // ローカルストレージに値を保存
            localStorage.setItem('companyName', companyName);
            localStorage.setItem('examDate', examDate);
            localStorage.setItem('applicationMethod', applicationMethod);
            localStorage.setItem('examContent', examContent);
            localStorage.setItem('questionContent', questionContent);
            localStorage.setItem('impression', impression);
            localStorage.setItem('remarks', remarks);

            // 確認画面に遷移
            window.location.href = 'confirmation.html';
            return false;
        }
    </script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>