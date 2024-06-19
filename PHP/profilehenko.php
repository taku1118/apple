<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テンプレート</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php session_start();?>
    <?php require 'db-connect.php'; ?>
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
<body style="background-color: #E6ECF0;">
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-10 mx-auto" style="padding: 20px;">
            <h1 class="title" style="margin-left:360px; margin-top:20px;">プロフィール</h1>
                <?php
                $sql=$pdo->query("SELECT * FROM users where student_number='0000000'");
                $res = $sql->fetch(PDO::FETCH_ASSOC);
                ?>

                <form action="profileupdate.php" method="post" enctype="multipart/foem-date">
                    <div class="form-group">
                        <label for="nickname" style="font-size:20px; margin-top:20px;">ユーザーネーム</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" name="nickname"  style="flex-grow: 1;" value="<?php echo $res['nickname']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="message" style="font-size:20px; margin-top:30px;">コメント</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" name="comment" value="<?php echo $res['my_comment']; ?>" style="flex-grow: 1;">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" style="width: 8%; heigth:10%; font-size:20px; margin-top: 40px; margin-left:440px;"
                        value="変 更">
                </form>

                
            </main>
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