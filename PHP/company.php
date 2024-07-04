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

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

    <!-- common.CSS -->
    <link href="../CSS/common.css" rel="stylesheet">

    <style>
    .search-box{
        height: 100px;
        width:100%;
    }

    #company-name-search-form{
        padding: 0 1rem;
        width: 100%;
        height: 3rem;
    }

    @media (min-width: 1200px) {
        #company-name-search-form {
            padding: 0 2rem;
        }
    }

    #company-name-search-form button{   
        padding: 0 1.3rem;
    }

    @media (min-width: 1200px) {
        .rowwrap {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }

    a:not([class]) {
        text-decoration-skip-ink: auto;
        color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
    }
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
<?php
$company_ids = [];
// 名前検索
if (isset($_GET['company-name'])) {
    $company_name=$_GET['company-name'];
    if($company_name==''){
        $company_ids = $pdo->query('SELECT company_id FROM Companies');
    }else{
        $company_ids = $pdo->prepare('SELECT company_id FROM Companies WHERE company_name LIKE ? OR company_name_ruby LIKE ?');
                    $company_ids->execute(['%' . $company_name . '%', $company_name . '%']);
    }
// 勤務地検索
} elseif (isset($_GET['prefecture_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_Prefecture WHERE prefecture_id = ?');
    $company_ids->execute([$_GET['prefecture_id']]);
// 職種検索
} elseif (isset($_GET['job_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_JobType WHERE job_id = ?');
    $company_ids->execute([$_GET['job_id']]);
// 業界検索
} elseif (isset($_GET['industry_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_Industry WHERE industry_id = ?');
    $company_ids->execute([$_GET['industry_id']]);
}
$company_ids = $company_ids->fetchAll(PDO::FETCH_COLUMN);
?>
            <!-- 企業名検索フォーム -->
            <div class="d-flex align-items-center search-box">
                <form id="company-name-search-form" action = "company.php" method="get" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="company-name" placeholder="企業名を入力" aria-label="Search" >
                    <button class="btn btn-success text-nowrap" type="submit">検索</button>
                </form>
            </div>
            <div class="row m-0 rowwrap">
<?php
if (empty($company_ids)) {
    echo '該当する企業が見つかりませんでした。';
} else {
    foreach ($company_ids as $company_id) {
        $company_detail = $pdo->prepare('SELECT * FROM Companies WHERE company_id = ?');
        $company_detail->execute([$company_id]);
        foreach ($company_detail as $row) {
            echo '<div class="col-xl-6 px-3">';
              echo '<div class="card mb-3">';
                echo '<div class="card-body d-flex">';
                  echo '<figure class="figure mb-0 me-3 align-self-center d-none d-sm-block">';
            if (empty($row['logo_image'])) {
                echo '<img src="../IMAGE/no_image.jpg" alt="..." width="100" height="auto">';
            } else {
                echo '<img src="../IMAGE/LOGO/',$row['logo_image'], '" alt="..." width="100" height="auto">';
            }
                  echo '</figure>';
                  echo '<div>';
                    echo '<h4 class="card-title">',$row['company_name'],'</h4>';
                    echo '<p class="card-text mb-2">会社ホームページ : <a href="',$row['company_url'],'">',$row['company_url'],'</a></p>';
                    echo '<p class="card-text mb-2">本社所在地 : ',$row['company_location'],'</p>';
                    echo '<a class="btn btn-primary me-2" href="keijiban.php?company_id=',$row['company_id'],'">掲示板</a>';
                    echo '<a class="btn btn-primary" href="report-list.php?company_id=',$row['company_id'],'">受験報告書一覧</a>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            echo '</div>';
        }
    }
}
?>
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

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>