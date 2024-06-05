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
<div class="card px-4 py-3 mx-4 my-4">
<?php
if(isset($_GET['company_id'])){
  $company_id=$_GET['company_id'];
  $reports = $pdo->prepare('SELECT A.report_id,A.exam_date,A.exam_way,B.user_name FROM Exam_Reports AS A LEFT JOIN Users AS B ON A.student_number = B.student_number WHERE company_id = ?');
  $reports->execute([$company_id]);
  $reports = $reports->fetchAll();
  echo '<table class="table table-hover">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col">日付</th>';
  echo '<th scope="col">試験内容</th>';
  echo '<th scope="col">名前</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  if(!empty($reports)){
    foreach($reports as $row){
      echo '<tr data-href="report.php?report_id=',$row['report_id'],'">';
      echo '<td>',$row['exam_date'],'</td>';
      echo '<td>',$row['exam_way'],'</td>';
      echo '<td>',$row['user_name'],'</td>';
      echo '</tr>';
    }
  }else{
    echo '<tr><td colspan="3">該当企業の受験報告書はありません。</td></tr>';
  }
  echo '</tbody>';
  echo '</table>';
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