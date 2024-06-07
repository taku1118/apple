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
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
<div class="container mt-3 mb-3">
        <h1>受験報告書</h1>
<?php
if (isset($_GET['report_id'])) {
    $report_datas = $pdo->prepare('SELECT * FROM Exam_Reports WHERE report_id = ?');
    $report_datas->execute([$_GET['report_id']]);
    $report_datas=$report_datas->fetch();
    if(!empty($report_datas)){
        $company_datas = $pdo->prepare('SELECT * FROM Companies WHERE company_id = ?');
        $company_datas->execute([$report_datas['company_id']]);
        $company_datas = $company_datas->fetch();
        $student_datas = $pdo->prepare('SELECT A.*,B.school_name,C.course_name FROM Users AS A JOIN Schools AS B ON A.school_id=B.school_id JOIN Courses AS C ON A.course_id=C.course_id WHERE student_number = ?');
        $student_datas->execute([$report_datas['student_number']]);
        $student_datas = $student_datas->fetch();
        echo '<div class="card p-3 mb-3">';
        echo '<table class="table table-bordered mb-0">';
        echo '<tr>';
        echo '<th>会社病院施設名</th>';
        echo '<td>',$company_datas['company_name'],'</td>';
        echo '<th>所在地</th>';
        echo '<td>',$company_datas['company_location'],'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th>応募方法</th>';
        echo '<td colspan="3">',$report_datas['apply_way'],'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th>試験次数</th>';
        echo '<td colspan="3">',$report_datas['exam_step'],'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th>試験内容</th>';
        echo '<td colspan="3">',$report_datas['exam_way'],'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th>試験日</th>';
        echo '<td colspan="3">',$report_datas['exam_date'],'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<td>';
        echo '<tr>';
        echo '<th>学校名</th>';
        echo '<td>',$student_datas['school_name'],'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>学科名</th>';
        echo '<td>',$student_datas['course_name'],'</td>';
        echo '</tr>';
        echo '</td>';
        echo '<th>氏名</th>';
        echo '<td>',$student_datas['user_name'],'</td>';
        echo '</tr>';

        echo '<tr>';
        echo '<th>質問内容</th>';
        echo '<td colspan="3">';
        echo $report_datas['question'];
        echo '</td>';
        echo '</tr>';

        echo '<tr>';
        echo '</tr>';
        echo '<th>感想</th>';
        echo '<td colspan="3">';
        echo $report_datas['opinion'];
        echo '</td>';

        echo '<tr>';
        echo '<th>備考</th>';
        echo '<td colspan="3">';
        echo $report_datas['other'];
        echo '</td>';
        echo '</tr>';

        echo '</table>';
        
        echo '</div>';
    }else{
        echo '<p>該当の受験報告書はありません。</p>';
    }
}else{
    echo '<p>該当の受験報告書はありません。</p>';
}
  ?>
<div class="d-flex">
        <button class="ms-auto me-3 btn btn-secondary text-nowrap btn-lg" onclick="history.back()">戻る</button>
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