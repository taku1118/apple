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
            <h1 class="title" style="margin-left:360px;">プロフィール</h1>
                <?php
                $sql=$pdo->prepare("update users SET nickname=? , my_comment=? where student_number='0000000'");
                $sql->execute([$_POST["nickname"],$_POST["comment"]]);


                // $res = $sql->fetch(PDO::FETCH_ASSOC);
                ?>


                    <div class="form-group">
                        <label for="nickname" style="font-size:20px;">ユーザーネーム</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" name="nickname"  style="flex-grow: 1;" value="<?php echo $_POST['nickname']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="message" style="font-size:20px;">コメント</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" name="comment" value="<?php echo $_POST["comment"]; ?>" style="flex-grow: 1;">
                        </div>
                    </div>

                    <h3>変更が完了しました</h3>
                    
                    <div class="d-flex"  style="margin-top:3%;">
                    <button type="button" onclick="history.back()" class="btn btn-primary" style="width: 6%; height: 3%; font-size: 15px; margin-right: 1rem;">戻る</button>
                    
                    </div>
                    
                    

                
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