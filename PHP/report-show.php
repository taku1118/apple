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
        aspect-ratio: 210 / 297;
        width: 100%;
        max-width: 720px;
        font-size: 2vw;
        padding: 0;
    }
    @media (min-width: 768px) {
        #exam-report{
        font-size: 1.2vw;
        }
    }
    .C-name{
        font-size: larger;
        overflow: hidden;/* はみ出た部分を非表示 */
        display: -webkit-box; /* 必須 */
        -webkit-box-orient: vertical; /* 必須 */
        -webkit-line-clamp: 5; /* 任意の行数を指定 */
    }
    .C-add{
        overflow: hidden;/* はみ出た部分を非表示 */
        display: -webkit-box; /* 必須 */
        -webkit-box-orient: vertical; /* 必須 */
        -webkit-line-clamp: 6; /* 任意の行数を指定 */
    }

    @media (min-width: 768px) {
        .C-name{
            -webkit-line-clamp: 4; /* 任意の行数を指定 */
        }
        .C-add{
            -webkit-line-clamp: 5; /* 任意の行数を指定 */
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
        <h3 class="mb-0 text-wrap">受験報告書</h3>
    </div>
    <div class="ms-auto d-flex">
        <button class="btn btn-secondary text-nowrap" onclick="history.back()">戻る</button>
    </div>
  </div>
</nav>
<div class="mt-3 mb-3 mx-3">
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
        echo '<div class="card p-3 mb-3 mx-auto" style="max-width: calc(720px + 2rem);">';
        echo '<div id="exam-report" class="container-fluid">';
        // 社名と所在地
        echo '<div class="d-flex" style="height:15%">';
        echo '<div class="d-flex align-items-center justify-content-center text-center border" style="width:12%">';
        echo '<span class="fw-bold">会社<br>病院<br>施設<br>名</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center border py-3 px-2" style="width:50%">';
        echo '<span class="C-name">',$company_datas['company_name'],'</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:8%">';
        echo '<span class="fw-bold">所<br>在<br>地</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center border py-2 px-2" style="width:30%">';
        echo '<span class="C-add">',$company_datas['company_location'],'</span>';
        echo '</div>';
        echo '</div>';
        // 応募方法
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:15%">';
        echo '<span class="fw-bold">応募方法</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:85%">';
        echo '<span>',$report_datas['apply_way'],'</span>';
        echo '</div>';
        echo '</div>';
        // 試験次数
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:15%">';
        echo '<span class="fw-bold">試験次数</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:85%">';
        echo '<span>',$report_datas['exam_step'],'</span>';
        echo '</div>';
        echo '</div>';
        // 試験内容
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:15%">';
        echo '<span class="fw-bold">試験分類</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:85%">';
        echo '<span>',$report_datas['exam_way'],'</span>';
        echo '</div>';
        echo '</div>';
        // 試験日
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:12%">';
        echo '<span class="fw-bold">試験日</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:88%">';
        $date = new DateTimeImmutable($report_datas['exam_date']);
        echo '<span>',$date->format('Y年n月j日'),'</span>';
        echo '</div>';
        echo '</div>';
        // 所属
        echo '<div class="d-flex" style="height:8%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:12%">';
        echo '<span class="fw-bold">学校名</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:38%">';
        echo '<span>',$student_datas['school_name'],'</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:12%">';
        echo '<span class="fw-bold">学科名</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:38%">';
        echo '<span>',$student_datas['course_name'],'</span>';
        echo '</div>';
        echo '</div>';
        // 質問内容・試験問題
        echo '<div class="d-flex align-items-center px-2 border" style="height:6%">';
        echo '<span><b>試験内容</b><br>・・・面接で質問された事項、試験で出た問題をできる限り書いてください。</span>';
        echo '</div>';
        echo '<div class="d-flex py-2 px-2 border" style="height:28%; width:100%;">';
        echo '<span class="Scrollbox">',$report_datas['question'],'</span>';
        echo '</div>';
        // 感想
        echo '<div class="d-flex align-items-center px-2 border" style="height:6%">';
        echo '<span><b>受験後の感想(所感)</b><br>・・・感じたこと及び今後の受験者へのアドバイス</span>';
        echo '</div>';
        echo '<div class="d-flex py-2 px-2 border" style="height:16%; width:100%;">';
        echo '<span class="Scrollbox">',$report_datas['opinion'],'</span>';
        echo '</div>';
        // 備考
        echo '<div class="d-flex align-items-center px-2 border" style="height:3%">';
        echo '<span class="fw-bold">備考</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="height:6%; width:100%;">';
        echo '<span class="txt-limit2">',$report_datas['other'],'</span>';
        echo '</div>';
        echo '</div>';
        
        echo '</div>';
    }else{
        echo '<p>該当の受験報告書はありません。</p>';
    }
}else{
    // echo '<p>該当の受験報告書はありません。</p>';
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