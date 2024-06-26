<?php session_start(); ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>受験報告書一覧</title>

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
      .report-table{
        max-width: 100%;
        font-size: 3vw;
      }
      
      @media (min-width: 768px) {
        .report-table{
        font-size: 1.4vw;
        }
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
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container-fluid">
    <div class="navbar-brand">
        <h3 class="mb-0 text-wrap">受験報告書一覧</h3>
    </div>
    <div class="ms-auto d-flex">
        <button class="btn btn-secondary text-nowrap" onclick="history.back()">戻る</button>
    </div>
  </div>
</nav>
<div class="card px-3 py-3 mx-4 my-4" style="overflow: hidden;">
<?php
if(isset($_GET['company_id'])){
  $company_id=$_GET['company_id'];
  $reports = $pdo->prepare('SELECT A.report_id,A.exam_date,A.exam_step,A.exam_type,B.user_name FROM Exam_Reports AS A LEFT JOIN Users AS B ON A.student_number = B.student_number WHERE company_id = ?');
  $reports->execute([$company_id]);
  $reports = $reports->fetchAll();
  echo '<div>';
  echo '<table class="table table-hover report-table" style="width:100%;table-layout:fixed;">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col" class="txt-limit1" style="width:25%;">日付</th>';
  echo '<th scope="col" class="txt-limit1" style="width:25%;">試験次数</th>';
  echo '<th scope="col" class="txt-limit1" style="width:25%;">試験分類</th>';
  echo '<th scope="col" class="txt-limit1" style="width:25%;">名前</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  if(!empty($reports)){
    foreach($reports as $row){
      echo '<tr data-href="report-show.php?report_id=',$row['report_id'],'">';
      echo '<td scope="col" style="width:25%;"><div class="txt-limit1">',$row['exam_date'],'</div></td>';
      echo '<td style="width:25%;"><div class="txt-limit1">',$row['exam_step'],'</div></td>';
      echo '<td style="width:25%;"><div class="txt-limit1">',$row['exam_type'],'</div></td>';
      echo '<td style="width:25%;"><div class="txt-limit1">',$row['user_name'],'</div></td>';
      echo '</tr>';
    }
  }else{
    echo '<tr><td colspan="4">該当企業の受験報告書はありません。</td></tr>';
  }
  echo '</tbody>';
  echo '</table>';
  echo '</div>';
}else{
  echo '<h3>該当する企業が見つかりませんでした。</h3>';
}
?>
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