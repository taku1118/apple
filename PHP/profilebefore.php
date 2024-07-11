<?php session_start(); ?>
<?php require 'judge.php'; ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>

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
    .background-image{
        background-image: url("../IMAGE/school.jpg");
        background-size: cover;
        height: 200px;
        width: 100%;
    }

    #company-name-search-form{
        padding: 0 3rem;
        width: 100%;
        height: 3rem;
    }

    #company-name-search-form button{   
        padding: 0 1.3rem;
    }

    .col-txt{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
    }

    .industry-link-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 0.5rem;
    }

    .industry-link {
        text-align: left;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
        box-sizing: border-box;
        text-decoration: none;
    }
    .form-control {
            overflow: hidden;
            word-wrap: break-word;
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
        <div style="height:100%;width:100%;">
            <div class="w-100 d-flex justify-content-center align-items-center px-5 pt-5" style="height:15%;">
                <h1 class="title d-block mt-5" style="text-align:center;background-color:#2A57A4;color:white;width: 100%;min-width:320px;max-width:640px;">プロフィール変更</h1>
           </div>
            <div class="d-flex justify-content-center align-items-center mx-5" style="height:85%;">
                <div style="width: 100%;min-width:320px;max-width:640px;"><!--  カードの幅を調整したいときはwidthを編集 -->
                    <?php
                    $number=$_SESSION['user']['student_number'];
                    $sql = $pdo->query("SELECT * FROM Users where student_number=$number");
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

                        <div style="text-align:center; margin-top: 40px;">
                            <input type="submit" class="btn btn-primary" style="font-size:20px;" value="変 更">
                        </div>
                    </form>
                </div>
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

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>