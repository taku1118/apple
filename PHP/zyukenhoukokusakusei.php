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
    <title>受験報告作成</title>
</head>
<body>
    <div class="container mt-5">
        <h1>受験報告作成</h1>
        <form action="confirmation.php" method="post">
            <div class="mb-3">
                <label for="companyName" class="form-label">企業名</label>
                <input type="text" class="form-control" id="companyName" name="companyName" required>
                
                <label for="examDateYear" class="form-label">受験日 年</label>
                <select class="form-select" id="examDateYear" name="examDateYear" required>
                    <option value="2020">2020年</option>
                    <option value="2021">2021年</option>
                    <option value="2022">2022年</option>
                    <option value="2023">2023年</option>
                    <option value="2024">2024年</option>
                    <option value="2025">2025年</option>
                </select>
                
                <label for="examDateMonth" class="form-label">受験日 月</label>
                <select class="form-select" id="examDateMonth" name="examDateMonth" required>
                    <option value="01">1月</option>
                    <option value="02">2月</option>
                    <option value="03">3月</option>
                    <option value="04">4月</option>
                    <option value="05">5月</option>
                    <option value="06">6月</option>
                    <option value="07">7月</option>
                    <option value="08">8月</option>
                    <option value="09">9月</option>
                    <option value="10">10月</option>
                    <option value="11">11月</option>
                    <option value="12">12月</option>
                </select>
                
                <label for="examDateDay" class="form-label">受験日 日</label>
                <select class="form-select" id="examDateDay" name="examDateDay" required>
                    <option value="01">1日</option>
                    <option value="02">2日</option>
                    <option value="03">3日</option>
                    <option value="04">4日</option>
                    <option value="05">5日</option>
                    <option value="06">6日</option>
                    <option value="07">7日</option>
                    <option value="08">8日</option>
                    <option value="09">9日</option>
                    <option value="10">10日</option>
                    <option value="11">11日</option>
                    <option value="12">12日</option>
                    <option value="13">13日</option>
                    <option value="14">14日</option>
                    <option value="15">15日</option>
                    <option value="16">16日</option>
                    <option value="17">17日</option>
                    <option value="18">18日</option>
                    <option value="19">19日</option>
                    <option value="20">20日</option>
                    <option value="21">21日</option>
                    <option value="22">22日</option>
                    <option value="23">23日</option>
                    <option value="24">24日</option>
                    <option value="25">25日</option>
                    <option value="26">26日</option>
                    <option value="27">27日</option>
                    <option value="28">28日</option>
                    <option value="29">29日</option>
                    <option value="30">30日</option>
                    <option value="31">31日</option>
                </select>

                <label for="applicationMethod" class="form-label">応募方法</label>
                <select class="form-select" id="applicationMethod" name="applicationMethod" required>
                    <option value="オンライン">オンライン</option>
                    <option value="直接応募">直接応募</option>
                    <option value="エージェント経由">エージェント経由</option>
                </select>

                <label for="examContent" class="form-label">試験内容</label>
                <select class="form-select" id="examContent" name="examContent" required>
                    <option value="筆記試験">筆記試験</option>
                    <option value="面接">面接</option>
                    <option value="実技試験">実技試験</option>
                </select>

                <label for="questionContent" class="form-label">質問内容</label>
                <input type="text" class="form-control" id="questionContent" name="questionContent" required>

                <label for="impression" class="form-label">感想</label>
                <input type="text" class="form-control" id="impression" name="impression" required>

                <label for="remarks" class="form-label">備考</label>
                <input type="text" class="form-control" id="remarks" name="remarks">
            </div>
            <button type="submit" class="btn btn-primary">確認</button>
        </form>
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