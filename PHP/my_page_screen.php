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
    .fontTitle{
        color: rgb(45, 55, 64);
        font-weight: bold;
        font-size: 24px;
        line-height: 24px;
        margin-bottom: 1rem;
    }
    .fontNormal{
        font-size: 14px;
    }
    </style>
</head>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
<symbol id="pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</symbol>
</svg>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
<div class="row py-3">
    <div class="col-xl-8">
        <!-- あなたの情報 -->
        <div class="p-4">
            <?php
                $personal_items = ["性別","現住所","生年月日","卒業予定年月","学校名","学科名","就活状況","内定有無"];
                $personal_inform = $pdo->prepare('SELECT gender,address,birthday,graduate_date,school_name,course_name,job_hunt,job_offer FROM Personal_Inform where student_number = ?');
                $personal_inform->execute([$_SESSION['user']['student_number']]);
                $fetch_data = $personal_inform->fetch(PDO::FETCH_ASSOC);
                $display = array_values($fetch_data);
            ?>
            <span class="d-inline-block fontTitle">あなたの情報</span>
            <a class="icon-link icon-link-hover text-decoration-none fs-5" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);" href="./personal_information_change_screen.php">
            <svg class="bi" aria-hidden="true"><use xlink:href="#pencil-square"></use></svg>
            編集
            </a>
            <div class="card shadow overflow-hidden">
                <div class="card-body">
                    <div class="card-text">
                        <?php for($i = 0; $i<count($personal_items); $i++): ?>
                            <div class="row">
                                <div class="col-4">
                                    <span class="fontNormal"><?= $personal_items[$i] ?></span>
                                </div>
                                <div class="col">
                                <span class="fontNormal"><?= $display[$i] ?></span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- 希望する条件 -->
        <div class="p-4">
        <?php
            $Desire_items = ["希望する勤務地","希望する業界","希望する職種"];
            $Desire_Inform = $pdo->prepare('SELECT prefecture_name, industry_name, job_name FROM Desire_Inform where student_number = ?');
            $Desire_Inform->execute([$_SESSION['user']['student_number']]);
            $desire_fetch = $Desire_Inform->fetch();
        ?>
            <span class="fontTitle d-inline-block">希望する条件</span>
            <a class="icon-link icon-link-hover text-decoration-none fs-5" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);" href="./suggested_condition.php">
            <svg class="bi" aria-hidden="true"><use xlink:href="#pencil-square"></use></svg>
            編集
            </a>
            <div class="card shadow overflow-hidden">
                <div class="card-body">
                    <div class="card-text">
                        <?php if(!empty($desire_fetch)): ?>
                            <?php for($i = 0; $i<count($Desire_items); $i++): ?>
                                <div class="row"> <!-- ここでFor文を回す -->
                                    <div class="col-5">
                                        <span class="fontNormal"><?= $Desire_items[$i] ?></span>
                                    </div>
                                    <div class="col">
                                        <span class="fontNormal"><?= $desire_fetch[$i] ?></span>
                                    </div>
                                </div>
                            <?php endfor; ?>
                            <?php else: ?>
                            <?php for($i = 0; $i<count($Desire_items); $i++): ?>
                                <div class="row">
                                    <div class="col-5">
                                            <span class="fontNormal"><?= $Desire_items[$i] ?></span>
                                    </div>
                                    <div class="col">
                                        <span class="fontNormal">------</span>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- 希望する条件はここまで -->
    </div>
    <div class="col-xl-4">
        <!-- 所持スキル -->
        <div class="p-4">
            <?php
                $Licence_Inform = $pdo->prepare('SELECT * FROM Licence_Inform where student_number = ?');
                $Licence_Inform->execute([$_SESSION['user']['student_number']]);
                $fetch_data = $Licence_Inform->fetchAll();
            ?>
            <span class="d-inline-block fontTitle">所有スキル</span>
            <a class="icon-link icon-link-hover text-decoration-none fs-5" style="--bs-icon-link-transform: translate3d(0, -.150rem, 0);" href="./ownership_skill.php">
            <svg class="bi" aria-hidden="true"><use xlink:href="#pencil-square"></use></svg>
            編集
            </a>
            <div class="card shadow overflow-hidden">
                <div class="card-body">
                    <p class="card-text">
                    <ul>
                        <?php if(!empty($desire_fetch)): ?>
                            <?php foreach($fetch_data as $row): ?>
                                <li class="fontNormal"><?= $row['licence_name'] ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="fontNormal">--------------</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 所持スキルはここまで -->
        <!-- 個人設定 -->
        <div class="p-4">
            <div class="card shadow overflow-hidden">
                <h5 class="card-header fontTitle mb-0">個人設定</h5>
                <div class="card-body p-0">
                    <div class="card-text list-group list-group-flush">
                        <a href="./profilebefore.php" class="text-decoration-none list-group-item">
                            <span class="fontNormal">プロフィール変更</span>
                        </a>
                        <a href="./pass_change.php" class="text-decoration-none list-group-item">
                            <span class="fontNormal">パスワード変更</span>
                        </a>
                        <a onclick="logout()" class="text-decoration-none list-group-item">
                            <span class="fontNormal">ログアウト</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 個人設定はここまで -->
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