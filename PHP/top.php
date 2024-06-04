<?php session_start(); ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>

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
    .background-image{
        background-image: url("../IMAGE/school.jpg");
        background-size: cover;
        height: 200px;
        width:100%;
    }

    #company-name-search-form{
        padding: 0 3rem;
        width: 100%;
        height: 3rem;
    }

    #company-name-search-form button{   
        padding: 0 1.3rem;
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
            <!-- 企業名検索フォーム -->
            <div class="mb-4 background-image d-flex align-items-center">
                <form id="company-name-search-form" action = "company.php" method="post" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="company-name" placeholder="企業名を入力" aria-label="Search" >
                    <button class="btn btn-success text-nowrap" type="submit">検索</button>
                </form>
            </div>
            <div class="container-fluid">
                <!-- 勤務地検索フォーム -->
                <div class="card mb-4" style="margin: 0 5vw;">
                    <div class="card-header">
                        <h5>勤務地から企業を検索</h5>
                    </div>
                    <!-- 地域ごとのボタン -->
                    <div class="card-body">
                    <?php
                    $sql1=$pdo->query('SELECT * FROM Regions');
                    foreach($sql1 as $row1){
                        echo '<div class="row">';
                        echo '<div class="col-3">';
                        echo '<h6>',$row1['region_name'],'</h6>';
                        echo '</div>';
                        $sql2=$pdo->prepare('SELECT * FROM Prefectures where region_id = ?');
                        $sql2->execute([$row1['region_id']]);
                        echo '<div class="col mb-2">';
                        echo '<div class="btn-group" role="group" style="display: flex;flex-wrap: wrap;">';
                        foreach($sql2 as $row2){
                            
                            echo '<a class="me-2 mb-2 text-nowrap" href="company.php?prefecture_id=',$row2['prefecture_id'],'">',$row2['prefecture_name'],'</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    </div>
                </div>
                <!-- 職種検索フォーム -->
                <div class="card mb-4" style="margin: 0 5vw;">
                    <div class="card-header">
                        <h5>職種から企業を検索</h5>
                    </div>
                    <!-- 職種ごとのボタン -->
                    <div class="card-body">
                        <div id="job-type-buttonsbtn-group" role="group">
                <?php
                $sql = $pdo->query('SELECT * FROM JobTypes');
                foreach ($sql as $row) {
                    echo '<a class="btn btn-primary me-2 mb-2" href="company.php?job_id=' ,$row['job_id'], '">' ,$row['job_name'],'</a>';
                }
                ?>
                        </div>
                    </div>
                </div>
                <!-- 業界検索フォーム -->
                <div class="card mb-4" style="margin: 0 5vw;">
                    <div class="card-header">
                        <h5>業界から企業を検索</h5>
                    </div>
                    <!-- 業界検索ボタン -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#industry-buttons" aria-expanded="true" aria-controls="industry-buttons" style="display: block;width:95%;margin-left: auto;margin-right: auto;">
                                業界を選択
                        </button>
                        <div id="industry-buttons" class="collapse mt-3">
                            <div class="mb-2" role="group">
                <?php
                $sql = $pdo->query('SELECT * FROM Industries');
                $industry=$sql->fetchAll();
                foreach ($industry as $i=>$row) {
                    if($i%3==0){
                        echo '<div class="row">';
                    }
                    echo '<a class="col mx-auto mb-2" href="company.php?industry_id=' ,$row['industry_id'], '">・' ,$row['industry_name'], '</a>';
                    if($i%3==2||count($industry)==$i){
                        echo '</div>';
                    }

                }
                ?>    
                            </div>
                        </div>
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

    <!-- common.Script-->
    <script src="../SCRIPT/common.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>