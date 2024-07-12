<?php session_start(); ?>
<?php require 'judge.php'; ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スキル変更</title>

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
        .font {
            color: rgb(45, 55, 64);
            font-weight: bold;
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
<?php
    $sql = $pdo->query('SELECT * FROM Prefectures');
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = $pdo->query('SELECT * FROM Industries');
    $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
    $sql3 = $pdo->query('SELECT * FROM JobTypes');
    $res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
    $id = $_SESSION['user']['student_number'];
    $sql4 =  $pdo->prepare('SELECT * FROM Users WHERE student_number=?');
    $sql4->execute([$id]);
    $res4 = $sql4->fetch(PDO::FETCH_ASSOC);
?>

    <div class="d-flex justify-content-center align-items-center" style="height:100%;width:100%;overflow:auto;">
        <div class="card shadow p-5 my-3" style="width: 90%;min-width:320px;max-width:640px;"><!--  カードの幅を調整したいときはwidthを編集 -->
            <h2 class="font">希望する条件</h2>
            <form action="suggested_condition_process.php?id=<?=$id?>" method="post">
                <div id="card_area">
                    <div class="row my-5"> <!-- ここでFor文を回す -->
                        <div class="col">
                            <span class="fs-4">希望する勤務地</span>
                        </div>
                        <div class="col-7">
                            <select class="form-select" id="exampleFormSelect1" name="prefecture">                          
                                <option value="null">未定</option>
                                <?php foreach($res as $row): ?>
                                <option value="'<?= $row['prefecture_id'] ?>'"
                                    <?php if($row['prefecture_id']==$res4['desire_state_prefecture']) : ?>
                                        selected
                                    <?php endif; ?>
                                    >
                                    <?= $row['prefecture_name'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col">
                            <span class="fs-4">希望する業界</span>
                        </div>
                        <div class="col-7">
                            <select class="form-select" id="exampleFormSelect1" name="industry">
                                <option value="null">未定</option>
                                <?php foreach($res2 as $row): ?>
                                <option value="'<?= $row['industry_id'] ?>'"
                                    <?php if($row['industry_id']==$res4['desire_state_industry']) : ?>
                                        selected
                                    <?php endif; ?>
                                    >
                                    <?= $row['industry_name'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col">
                            <span class="fs-4">希望する職種</span>
                        </div>
                        <div class="col-7">
                            <select class="form-select" id="exampleFormSelect1" name="jobtype">
                                <option value="null">未定</option>
                                <?php foreach($res3 as $row): ?>
                                <option value="'<?= $row['job_id'] ?>'"
                                <?php if($row['job_id']==$res4['desire_state_jobtype']) : ?>
                                        selected
                                    <?php endif; ?>
                                    >
                                    <?= $row['job_name'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-secondary" href="my_page_screen.php">キャンセル</a>
                        <button class="btn btn-primary ms-3" id="change_confirm" type="submit">確定</button>
                    </div>
                </div>
            </form>
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

    <!-- 入力欄 -->
    <script src="../SCRIPT/ownership_skill.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>