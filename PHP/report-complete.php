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
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
<?php
$report_sql = $pdo->prepare('
INSERT INTO Exam_Reports (
report_id,
company_id,
company_name,
company_location,
student_number,
school_name,
course_name,
exam_date,
application_method,
exam_step,
exam_type,
exam_content,
impression,
remarks) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)
');
$report_sql->execute([
    NULL,
    $_POST['company_id'],
    $_POST['company_name'],
    $_POST['company_location'],
    $_POST['student_number'],
    $_POST['school_name'],
    $_POST['course_name'],
    $_POST['examDate'],
    $_POST['applicationMethod'],
    $_POST['examStep'],
    $_POST['examType'],
    $_POST['examContent'],
    $_POST['impression'],
    $_POST['remarks']
]);
?>
<div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
        <h1 class="mb-4">報告完了しました！</h1>
        <h1 class="mb-4">ご協力ありがとうございます。</h1>
        <form action="top.php" method="post">
            <button type="submit" class="btn btn-primary">TOPに戻る</button>
        </form>
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