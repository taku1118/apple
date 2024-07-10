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
    <div class="d-flex justify-content-center align-items-center" style="height:100%;width:100%;">
        <div class="card shadow p-5" style="width: 90%;min-width:320px;max-width:640px;"><!--  カードの幅を調整したいときはwidthを編集 -->
            <h2 class="font">所有スキル変更</h2>
            <form action="ownership_skill_process.php" method="post" id="skills-form">
                <div id="card_area" class="Scrollbox" style="max-height: 300px;overflow-y: auto;overflow-x: hidden;">
                <?php
                    $student_number = $_SESSION['user']['student_number'];
                    $stmt = $pdo->prepare("SELECT skill_name FROM Skill_Manage WHERE student_number = ?");
                    $stmt->execute([$student_number]);
                    $skills = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    if (!empty($skills)) {
                        foreach ($skills as $skill) {
                            echo '
                            <div class="row g-0 my-1 input_area">
                                <div class="col-11 px-3">
                                    <input type="text" name="skills[]" class="form-control" value="'. htmlspecialchars($skill['skill_name']) .'" required>
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <button type="button" class="remove_input btn btn-outline-dark">✕</button>
                                </div>
                            </div>';
                        }
                    }
                    ?>
                </div>
                <div class="d-flex justify-content-center align-items-center mb-1">
                    <button type="button" id="add_input" class="btn"><i class="bi bi-plus-circle" style="font-size: 2rem;"></i></button>
                </div>
                <div class="d-flex justify-content-end">
                    <a class="btn btn-secondary" href="my_page_screen.php">キャンセル</a>
                    <button class="btn btn-primary ms-3" id="change_confirm" type="submit">確定</button>
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