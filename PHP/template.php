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

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>

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
<form action="test.php" method="post">
<?php 
$sql = $pdo->query('SELECT * FROM Companies');
$res = $sql->fetchAll(PDO::FETCH_ASSOC);
$Jsql = $pdo->query('SELECT * FROM JobTypes');
$Jres = $Jsql->fetchAll(PDO::FETCH_ASSOC);
$Psql = $pdo->query('SELECT * FROM Prefectures');
$Pres = $Psql->fetchAll(PDO::FETCH_ASSOC);
$Isql = $pdo->query('SELECT * FROM Industries');
$Ires = $Isql->fetchAll(PDO::FETCH_ASSOC);
foreach($res as $row){
    echo '<input type="hidden" name="companies[' . $row['company_id'] . '][id]" value="',$row['company_id'],'">';
    echo $row['company_name'],'<br>';
    echo '<select name="companies[' . $row['company_id'] . '][JobType]">';                               
        foreach ($Jres as $Jrow) {
        echo '<option value=',$Jrow['job_id'],'>',$Jrow['job_name'],'</option>';
        }
    echo '</select>','<br>';
    echo '<select name="companies[' . $row['company_id'] . '][Prefecture]">';                               
        foreach ($Pres as $Prow) {
        echo '<option value=',$Prow['prefecture_id'],'>',$Prow['prefecture_name'],'</option>';
        }
    echo '</select>','<br>';
    echo '<select name="companies[' . $row['company_id'] . '][Industry]">';                               
        foreach ($Ires as $Irow) {
        echo '<option value=',$Irow['industry_id'],'>',$Irow['industry_name'],'</option>';
        }
    echo '</select>','<br>';
}
?>
<button type="submit">送信</button>
</form>
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