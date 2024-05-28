<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ
    </title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

    <style>
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
            <!-- 企業名検索フォーム -->
            <div class="mb-4 background-image1">
                <form id="company-name-search-form" action = "search.php" method="post" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="企業名を入力" aria-label="Search" >
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <!-- 勤務地検索フォーム -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3>勤務地から企業を検索</h3>
                </div>
                <!-- 地域ごとのボタン -->
                <div id="card-body location-buttons">
                <?php
                $sql1=$pdo->query('SELECT * FROM Regions');
                foreach($sql1 as $row1){
                    echo '<div class="row">';
                    echo '<div class="col-2">';
                    echo '<h5>',$row1['region_name'],'</h5>';
                    echo '</div>';
                    $sql2=$pdo->prepare('SELECT * FROM Prefectures where region_id = ?');
                    $sql2->execute([$row1['region_id']]);
                    echo '<div class="col btn-group mb-2" role="group">';
                    foreach($sql2 as $row2){
                        echo '<a class="me-2 mb-2" href="search.php?prefecture_id=',$row2['prefecture_id'],'">',$row2['prefecture_name'],'</a>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                </div>
            </div>
            <!-- 職種検索フォーム -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3>職種から企業を検索</h3>
                </div>
                <!-- 職種ごとのボタン -->
                <div id="job-type-buttonsbtn-group mb-2" role="group">
            <?php
            $sql = $pdo->query('SELECT * FROM JobTypes');
            foreach ($sql as $row) {
                echo '<a class="btn btn-primary me-2 mb-2" href="search.php?job_id=' ,$row['job_id'], '">' ,$row['job_name'],'</a>';
            }
            ?>
                </div>
            </div>
            <!-- 業界検索フォーム -->
            <div class="card mb-4">
                <div class="card-header">
                    <h2>業界から企業を検索</h2>
                </div>
                <!-- 業界検索ボタン -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="collapse" data-bs-target="#industry-buttons" aria-expanded="false" aria-controls="industry-buttons">
                        業界を選択
                </button>
                <div id="industry-buttons" class="collapse">
                    <div class="mb-2" role="group">
            <?php
            $sql = $pdo->query('SELECT * FROM Industries');
            $industry=$sql->fetchAll();
            foreach ($industry as $i=>$row) {
                if($i%3==0){
                    echo '<div class="row">';
                }
                echo '<a class="col me-2 mb-2" href="search.php?industry_id=' ,$row['industry_id'], '">・' ,$row['industry_name'], '</a>';
                if($i%3==2||count($industry)==$i){
                    echo '</div>';
                }

            }
            ?>    
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