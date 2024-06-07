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
    #exam-report{
        aspect-ratio: 210/297;
    }
    #exam-report .row{
        margin-left: 0;
        margin-right: 0;
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
        echo '<div id="exam-report">';
        // 社名と所在地
        echo '<div class="row">';
        echo '<div class="col border">';
        echo '会社<br>病院<br>施設<br>名';
        echo '</div>';
        echo '<div class="col border">';
        echo $company_datas['company_name'];
        echo '</div>';
        echo '<div class="col border">';
        echo '所<br>在<br>地';
        echo '</div>';
        echo '<div class="col border">';
        echo $company_datas['company_location'];
        echo '</div>';
        echo '</div>';
        // 応募方法
        echo '<div class="row">';
        echo '<div class="col border">';
        echo '応募方法';
        echo '</div>';
        echo '<div class="col border">';
        echo '学校求人';
        echo '</div>';
        echo '</div>';
        // 試験次数
        echo '<div class="row">';
        echo '<div class="col border">';
        echo '試験次数';
        echo '</div>';
        echo '<div class="col border">';
        echo $report_datas['exam_step'];
        echo '</div>';
        echo '</div>';
        // 試験内容
        echo '<div class="row">';
        echo '<div class="col border">';
        echo '試験分類';
        echo '</div>';
        echo '<div class="col border">';
        echo $report_datas['exam_way'];
        echo '</div>';
        echo '</div>';
        // 試験日
        echo '<div class="row">';
        echo '<div class="col border">';
        echo '試験日';
        echo '</div>';
        echo '<div class="col border">';
        echo $report_datas['exam_date'];
        echo '</div>';
        echo '</div>';
        // 所属と氏名
        echo '<div class="row">';
        echo '<div class="col border">';
        echo '学校名';
        echo '</div>';
        echo '<div class="col border">';
        echo $student_datas['school_name'];
        echo '</div>';
        echo '<div class="col border">';
        echo '学科名';
        echo '</div>';
        echo '<div class="col border">';
        echo $student_datas['course_name'];
        echo '</div>';
        echo '</div>';
        // 質問内容・試験問題
        echo '<div class="row border">';
        echo '試験内容(面接で質問された事項、試験で出た問題をできる限り書いてください)';
        echo '</div>';
        echo '<div class="row border">';
        echo $report_datas['question'];
        echo '</div>';
        // 感想
        echo '<div class="row border">';
        echo '感想(感じたこと及び今後の受験者へのアドバイス)   ';
        echo '</div>';
        echo '<div class="row border">';
        echo $report_datas['opinion'];
        echo '</div>';
        // 備考
        echo '<div class="row border">';
        echo '備考';
        echo '</div>';
        echo '<div class="row border">';
        echo $report_datas['other'];
        echo '</div>';
        echo '</div>';
        
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