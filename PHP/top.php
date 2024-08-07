<?php session_start(); ?>
<?php require 'judge.php'; ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>

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
    .background-image{
        background-image: url("../IMAGE/school.jpg");
        background-size: cover;
        height: 200px;
        width: 100%;
    }

    #company-name-search-form{
        padding: 0 3rem;
        width: 100%;
        height: 3rem;
    }

    #company-name-search-form button{   
        padding: 0 1.3rem;
    }

    .col-txt{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
    }

    .industry-link-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 0.5rem;
    }

    .industry-link {
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        box-sizing: border-box;
        text-decoration: none;
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
                <form id="company-name-search-form" action="company.php" method="get" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" id="company-name" name="company-name" placeholder="企業名を入力" aria-label="Search">
                    <button class="btn btn-success text-nowrap" type="submit">検索</button>
                </form>
            </div>
            <div class="container-fluid">
                <!-- 勤務地検索フォーム -->
                <div class="card mb-4" style="margin: 0 5vw;">
                    <div class="card-header">
                        <h5 class="m-0" style="font-weight: bold;color: rgb(45, 55, 64);">勤務地から企業を検索</h5>
                    </div>
                    <!-- 地域ごとのボタン -->
                    <div class="card-body">
                    <?php
                    $sql1=$pdo->query('SELECT * FROM Regions');
                    foreach($sql1 as $row1){
                        echo '<div class="row">';
                        echo '<div class="col-3 d-flex align-items-center">';
                        echo '<h6 class="m-0">',$row1['region_name'],'</h6>';
                        echo '</div>';
                        $sql2=$pdo->prepare('SELECT * FROM Prefectures where region_id = ?');
                        $sql2->execute([$row1['region_id']]);
                        echo '<div class="col">';
                        echo '<div class="btn-group" role="group" style="display: flex;flex-wrap: wrap;">';
                        foreach($sql2 as $row2){
                            echo '<a class="m-1 text-nowrap" href="company.php?prefecture_id=',
                            $row2['prefecture_id'],'" style="text-decoration: none;">',$row2['prefecture_name'],'</a>';
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
                        <h5 class="m-0" style="font-weight: bold;color: rgb(45, 55, 64);">職種から企業を検索</h5>
                    </div>
                    <!-- 職種ごとのボタン -->
                    <div class="card-body">
                        <div id="job-type-buttonsbtn-group" role="group">
                <?php
                $sql = $pdo->query('SELECT * FROM JobTypes');
                foreach ($sql as $row) {
                    echo '<a class="btn btn-outline-primary me-2 mb-2" href="company.php?job_id=' ,$row['job_id'], '">' ,
                    $row['job_name'],'</a>';
                }
                ?>
                        </div>
                    </div>
                </div>
                <!-- 業界検索フォーム -->
                <div class="card mb-4" style="margin: 0 5vw;">
                    <div class="card-header">
                        <h5 class="m-0" style="font-weight: bold;color: rgb(45, 55, 64);">業界から企業を検索</h5>
                    </div>
                    <!-- 業界検索ボタン -->
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#industry-buttons" aria-expanded="true" aria-controls="industry-buttons" style="display: block;width:95%;margin-left: auto;margin-right: auto;">
                                業界を選択
                        </button>
                        <div id="industry-buttons" class="collapse mt-3">
                            <div class="industry-link-container">
                            <?php
                            $sql = $pdo->query('SELECT * FROM Industries');
                            $industry=$sql->fetchAll();
                            foreach ($industry as $i=>$row) {
                                echo '<a href="company.php?industry_id=' ,
                                $row['industry_id'], '" class="industry-link"><span class="d-none d-sm-inline-block">　　</span>・' ,$row['industry_name'], '</a>';
                            }
                            ?>    
                            </div>
                        </div>
                    </div>
                </div>
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