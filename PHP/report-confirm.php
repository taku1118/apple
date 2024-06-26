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
<div class="mt-3 mb-3 mx-3">
<?php
$company_detail = $pdo->prepare('SELECT * FROM Companies WHERE company_id = ?');
$company_detail->execute([$_POST['companyId']]);
$company_detail = $company_detail->fetch();
$user_detail = $pdo->prepare('SELECT * FROM Users AS A INNER JOIN Schools AS B ON A.school_id = A.school_id INNER JOIN Courses AS C ON A.course_id = C.course_id WHERE student_number = ?');
$user_detail->execute([$_SESSION['user']['student_number']]);
$user_detail = $user_detail->fetch();
        echo '<form action="report-complete.php" class="card p-3 mb-3 mx-auto" style="max-width: calc(720px + 2rem);" method="post">';
        echo '<div id="exam-report" class="container-fluid">';
        // 社名と所在地
        echo '<div class="d-flex" style="height:15%">';
        echo '<div class="d-flex align-items-center justify-content-center text-center border" style="width:12%">';
        echo '<span class="fw-bold">会社<br>病院<br>施設<br>名</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center border py-3 px-2" style="width:50%">';
        echo '<span class="C-name">',$company_detail['company_name'],'</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:8%">';
        echo '<span class="fw-bold">所<br>在<br>地</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center border py-2 px-2" style="width:30%">';
        echo '<span class="C-add">',$company_detail['company_location'],'</span>';
        echo '</div>';
        echo '</div>';
        // 応募方法
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:15%">';
        echo '<span class="fw-bold">応募方法</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:85%">';
        echo '<span>',$_POST['applicationMethod'],'</span>';
        echo '</div>';
        echo '</div>';
        // 試験次数
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:15%">';
        echo '<span class="fw-bold">試験次数</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:85%">';
        echo '<span>',$_POST['examStep'],'</span>';
        echo '</div>';
        echo '</div>';
        // 試験内容
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:15%">';
        echo '<span class="fw-bold">試験分類</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:85%">';
        echo '<span>',$_POST['examType'],'</span>';
        echo '</div>';
        echo '</div>';
        // 試験日
        echo '<div class="d-flex" style="height:3%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:12%">';
        echo '<span class="fw-bold">試験日</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:88%">';
        $date = new DateTimeImmutable($_POST['examDate']);
        echo '<span>',$date->format('Y年n月j日'),'</span>';
        echo '</div>';
        echo '</div>';
        // 所属
        echo '<div class="d-flex" style="height:8%">';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:12%">';
        echo '<span class="fw-bold">学校名</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:38%">';
        echo '<span>',$user_detail['school_name'],'</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center justify-content-center border" style="width:12%">';
        echo '<span class="fw-bold">学科名</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="width:38%">';
        echo '<span>',$user_detail['course_name'],'</span>';
        echo '</div>';
        echo '</div>';
        // 質問内容・試験問題
        echo '<div class="d-flex align-items-center px-2 border" style="height:6%">';
        echo '<span><b>試験内容</b><br>・・・面接で質問された事項、試験で出た問題をできる限り書いてください。</span>';
        echo '</div>';
        echo '<div class="d-flex py-2 px-2 border" style="height:28%; width:100%;">';
        echo '<span class="Scrollbox">',$_POST['examContent'],'</span>';
        echo '</div>';
        // 感想
        echo '<div class="d-flex align-items-center px-2 border" style="height:6%">';
        echo '<span><b>受験後の感想(所感)</b><br>・・・感じたこと及び今後の受験者へのアドバイス</span>';
        echo '</div>';
        echo '<div class="d-flex py-2 px-2 border" style="height:16%; width:100%;">';
        echo '<span class="Scrollbox">',$_POST['impression'],'</span>';
        echo '</div>';
        // 備考
        echo '<div class="d-flex align-items-center px-2 border" style="height:3%">';
        echo '<span class="fw-bold">備考</span>';
        echo '</div>';
        echo '<div class="d-flex align-items-center px-2 border" style="height:6%; width:100%;">';
        echo '<span class="txt-limit2">',$_POST['remarks'],'</span>';
        echo '</div>';
        echo '</div>';

        echo '<input type="hidden" name="company_id" value="',$_POST['companyId'],'">';
        echo '<input type="hidden" name="company_name" value="',$company_detail['company_name'],'">';
        echo '<input type="hidden" name="company_location" value="',$company_detail['company_location'],'">';
        echo '<input type="hidden" name="student_number" value="',$_SESSION['user']['student_number'],'">';
        echo '<input type="hidden" name="school_name" value="',$user_detail['school_name'],'">';
        echo '<input type="hidden" name="course_name" value="',$user_detail['course_name'],'">';
        echo '<input type="hidden" name="applicationMethod" value="',$_POST['applicationMethod'],'">';
        echo '<input type="hidden" name="examDate" value="',$_POST['examDate'],'">';
        echo '<input type="hidden" name="examStep" value="',$_POST['examStep'],'">';
        echo '<input type="hidden" name="examType" value="',$_POST['examType'],'">';
        echo '<input type="hidden" name="examContent" value="',$_POST['examContent'],'">';
        echo '<input type="hidden" name="impression" value="',$_POST['impression'],'">';
        echo '<input type="hidden" name="remarks" value="',$_POST['remarks'],'">';

        echo '<button type="button" class="btn btn-primary" onclick="history.back();">戻る</button>';
        echo '<button type="submit" class="btn btn-primary">送信</button>';
        echo '</form>';
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