<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業検索結果</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

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
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから OR-------------------------------------------------------------------->
<?php
$company_ids = [];
if (isset($_POST['company-name'])) {
    $company_name=$_POST['company-name'];
    if($company_name==''){
        $company_ids = $pdo->query('SELECT company_id FROM Companies');
    }else{
        $company_ids = $pdo->prepare('SELECT company_id FROM Companies WHERE company_name LIKE ? OR company_name_ruby LIKE ?');
                    $company_ids->execute(['%' . $company_name . '%', $company_name . '%']);
    }
} elseif (isset($_GET['prefecture_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_Prefecture WHERE prefecture_id = ?');
    $company_ids->execute([$_GET['prefecture_id']]);
} elseif (isset($_GET['job_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_JobType WHERE job_id = ?');
    $company_ids->execute([$_GET['job_id']]);
} elseif (isset($_GET['industry_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_Industry WHERE industry_id = ?');
    $company_ids->execute([$_GET['industry_id']]);
}
$company_ids = $company_ids->fetchAll(PDO::FETCH_COLUMN);
?>
        <div class="row">
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <form id="company-name-search-form" action = "company.php" method="post" class="form-inline d-flex mb-3 mt-3" role="search" style="width: 100%;">
                    <input class="form-control me-2" type="search" name="Company-name" placeholder="企業名を入力" aria-label="Search" >
                    <button class="btn btn-success text-nowrap" type="submit">検索</button>
                </form>
                <div class="row">
<?php
if (empty($company_ids)) {
    echo '該当する企業が見つかりませんでした。';
} else {
    foreach ($company_ids as $company_id) {
        $company_detail = $pdo->prepare('SELECT * FROM Companies WHERE company_id = ?');
        $company_detail->execute([$company_id]);
        foreach ($company_detail as $row) {
            echo '<div class="col-md-6">';
              echo '<div class="card">';
                echo '<div class="card-body d-flex">';
                  echo '<figure class="mr-3">';
            if (empty($row['logo_image'])) {
                echo '<img src="../IMAGE/no_image.jpg" alt="..." width="50" height="50">';
            } else {
                echo '<img src="../IMAGE/LOGO/',$row['logo_image'], '" alt="..." width="50" height="50">';
            }
                  echo '</figure>';
                  echo '<div>';
                    echo '<h4 class="card-title">',$row['company_name'],'</h4>';
                    echo '<p class="card-text">会社ホームページ : <a href="',$row['company_url'],'" target="_blank">',$row['company_url'],'</a></p>';
                    echo '<p class="card-text">本社所在地 : ',$row['company_location'],'</p>';
                    echo '<a class="btn btn-primary btn-sm" href="keijiban.php?company_id=',$row['company_id'],'">掲示板</a>';
                    echo '<a class="btn btn-primary btn-sm" href="keijiban.php?company_id=',$row['company_id'],'">受験報告書一覧</a>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
        }
    }
}
?>
                </div>
            </main>
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