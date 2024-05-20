<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<!-- 企業名検索フォーム -->
<div class="mb-4">
    <form id="company-name-search-form" action = "search.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" id="company-name" placeholder="企業名を入力">
        </div>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>
<!-- 勤務地検索フォーム -->
<div class="mb-4">
    <h2>勤務地から企業を検索</h2>
    <!-- 地域ごとのボタン -->
    <div id="location-buttons">
        <?php
        $sql1=$pdo->query('SELECT * FROM Regions');
        foreach($sql1 as $row1){
            echo '<h3>',$row1['region_name'],'</h3>';
            $sql2=$pdo->prepare('SELECT * FROM Prefectures where region_id = ?');
            $sql2->execute([$row1['region_id']]);
            foreach($sql2 as $row2){
                echo '<a class="btn btn-secondary" href="search.php?prefecture_id=',$row2['prefecture_id'],'">',$row2['prefecture_name'],'</a>';
            }
        }
        ?>
    </div>
</div>
<!-- 職種検索フォーム -->
<div class="mb-4">
    <h2>職種から企業を検索</h2>
    <!-- 職種ごとのボタン -->
    <div id="job-type-buttons">
        <?php
        $sql = $pdo->query('SELECT * FROM JobTypes');
        foreach ($sql as $row) {
            echo '<a class="btn btn-secondary" href="search.php?job_id=' ,$row['job_id'], '">' ,$row['job_name'],'</a>';
        }
        ?>
    </div>
</div>
<!-- 業界検索フォーム -->
<div class="mb-4">
    <h2>業界から企業を検索</h2>
    <!-- 業界検索ボタン -->
    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#industry-buttons" aria-expanded="false" aria-controls="industry-buttons">
        業界を選択
    </button>
    <!-- 業界ごとのボタン（非表示） -->
    <div id="industry-buttons" class="region-buttons collapse">
        <?php
        $sql = $pdo->query('SELECT * FROM Industries');
        foreach ($sql as $row) {
            echo '<a class="btn btn-secondary" href="search.php?industry_id=' ,$row['industry_id'], '">' ,$row['industry_name'], '</a>';
        }
        ?>
    </div>
</div>
<?php require 'footer.php'; ?>