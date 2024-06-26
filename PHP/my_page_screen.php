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

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>

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
<div class="row m-3">
    <div class="col">
        <?php
            $personal_items = ["性別","現住所","生年月日","卒業予定年月","学校名","学科名","就活状況","内定有無"];
            $personal_inform = $pdo->prepare('SELECT gender,address,birthday,graduate_date,school_name,course_name,job_hunt,job_offer FROM Personal_Inform where student_number = ?');
            $personal_inform->execute([$_SESSION['user']['student_number']]);
            $fetch_data = $personal_inform->fetch(PDO::FETCH_ASSOC);
            $display = array_values($fetch_data);
        ?>
        <span class="fs-1 d-inline-block" style="width: 68%;">あなたの情報</span>
        <a href="./personal_information_change_screen.php" class="icon-link icon-link-hover fs-5 text-decoration-none" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
            <i class="bi bi-pencil-square mb-1"></i>
            編集
        </a>
        <div class="card shadow-sm" style="width: 40rem;"><!-- ここからCard -->
            <div class="card-body">
                <div class="card-text">
                    <?php for($i = 0; $i<count($personal_items); $i++): ?>
                        <div class="row">
                            <div class="col-4">
                                <span class="fs-4"><?= $personal_items[$i] ?></span>
                            </div>
                            <div class="col">
                            <span class="fs-4"><?= $display[$i] ?></span>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <?php
            $Licence_Inform = $pdo->prepare('SELECT * FROM Licence_Inform where student_number = ?');
            $Licence_Inform->execute(["0000001"]);
            $fetch_data = $Licence_Inform->fetchAll();
        ?>
        <span class="fs-1 d-inline-block" style="width: 50%;">所有スキル</span>
        <a href="./ownership_skill.php" class="icon-link icon-link-hover fs-5 text-decoration-none" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
            <i class="bi bi-pencil-square mb-1"></i>
            編集
        </a>
        <div class="card shadow-sm" style="width: 27rem;">
            <div class="card-body">
                <p class="card-text">
                <?php if(!empty($desire_fetch)): ?>
                    <?php foreach($fetch_data as $row): ?>
                        <p class="fs-4"><?= $row['licence_name'] ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="fs-4">--------------</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col my-4">
        <?php
            $Desire_items = ["希望する勤務地","希望する業界","希望する職種"];
            $Desire_Inform = $pdo->prepare('SELECT prefecture_name, industry_name, job_name FROM Desire_Inform where student_number = ?');
            $Desire_Inform->execute(["0000001"]);
            $desire_fetch = $Desire_Inform->fetch();
        ?>
        <span class="fs-1 d-inline-block">希望する条件</span>
        <a href="./suggested_condition.php" class="icon-link icon-link-hover fs-5 text-decoration-none" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
            <i class="bi bi-pencil-square mb-1"></i>
            編集
        </a>
        <div class="card shadow-sm" style="width: 35rem;">
            <div class="card-body">
                <div class="card-text">
                    <?php if(!empty($desire_fetch)): ?>
                        <?php for($i = 0; $i<count($Desire_items); $i++): ?>
                            <div class="row"> <!-- ここでFor文を回す -->
                                <div class="col-5">
                                    <span class="fs-4"><?= $Desire_items[$i] ?></span>
                                </div>
                                <div class="col">
                                    <span class="fs-4"><?= $desire_fetch[$i] ?></span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php else: ?>
                        <?php for($i = 0; $i<count($Desire_items); $i++): ?>
                            <div class="row">
                                <div class="col-5">
                                        <span class="fs-4"><?= $Desire_items[$i] ?></span>
                                </div>
                                <div class="col">
                                    <span class="fs-4">------</span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- Cardはここまで -->
    </div>
    <div class="col-sm-6 my-5">
        <div class="card shadow-sm" style="width: 29rem;">
            <h5 class="card-header fs-1">個人設定</h5>
            <div class="card-body">
                <div class="card-text">
                    <a href="./profilehenko.php" class="icon-link icon-link-hover fs-5 text-decoration-none d-block" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                        <span class="fs-4">プロフィール変更</span>
                    </a>
                    <a href="./pass_change.php" class="icon-link icon-link-hover fs-5 text-decoration-none d-block" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                        <span class="fs-4">パスワード変更</span>
                    </a>
                    <a href="#" class="icon-link icon-link-hover fs-5 text-decoration-none d-block" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);">
                        <span class="fs-4">ログアウト</span>
                    </a>
                </div>
            </div>
        </div> <!-- Cardはここまで -->
    </div>
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