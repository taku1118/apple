<?php session_start();?>
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<body style="background-color: #E6ECF0;">
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-10 mx-auto" style="padding: 20px; margin-top:20px">
                <h1 class="title" style="text-align:center;  background-color:#2A57A4;color:white;">プロフィール変更</h1>
                <?php
                $number=$_SESSION['user']['student_number'];
                $sql = $pdo->query("SELECT * FROM users where student_number=$number");
                $res = $sql->fetch(PDO::FETCH_ASSOC);
                ?>

                <form action="profileafter.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nickname" style="font-size:20px; margin-top:40px;">ニックネーム</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" name="nickname" style="flex-grow: 1;" value="<?php echo htmlspecialchars($res['nickname'], ENT_QUOTES); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment" style="font-size:20px; margin-top:40px;">コメント</label>
                        <div class="d-flex align-items-center">
                            <textarea class="form-control" name="comment" style="flex-grow: 1; resize: none;" rows="1"><?php echo htmlspecialchars($res['my_comment'], ENT_QUOTES); ?></textarea>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" style="width: 8%; height:10%; font-size:20px; margin-top: 40px; margin-left:460px;" value="変 更">
                </form>
            </main>
        </div>
    </div>

    <style>
        .form-control {
            overflow: hidden;
            word-wrap: break-word;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var textarea = document.querySelector('textarea[name="comment"]');

            function resizeTextarea() {
                textarea.style.height = 'auto';
                textarea.style.height = (textarea.scrollHeight) + 'px';
            }

            textarea.addEventListener('input', resizeTextarea);

            // Initial resize to fit existing content
            resizeTextarea();
        });
    </script>
</body>



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