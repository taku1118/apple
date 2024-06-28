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
            <main class="col-md-10 mx-auto" style="padding: 20px; margin-top:20px;">
                <h1 class="title" style="text-align:center; background-color:#2A57A4; color:white">プロフィール変更</h1>
                <?php
                $nickname = '';
                $comment = '';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nickname = $_POST["nickname"];
                    $comment = $_POST["comment"];
                    $nicknameError = '';
                    $commentError = '';

                    if (mb_strlen($nickname) > 30) {
                        $nicknameError = 'ニックネームは30文字以内で入力してください';
                        $nickname = '';
                    } 

                    if (mb_strlen($comment) > 500) {
                        $commentError = 'コメントは500文字以内で入力してください';
                        $comment = '';
                    } 

                    if (!$nicknameError && !$commentError) {
                        $sql = $pdo->prepare("UPDATE users SET nickname=?, my_comment=? WHERE student_number='0000000'");
                        if ($sql->execute([htmlspecialchars($nickname), htmlspecialchars($comment)])) {
                            $_SESSION['user']['nickname']=htmlspecialchars($nickname);
                            $message = '<h2 class="text-primary mb-0" style="margin-left:295px">変更が完了しました</h2>';
                        } else {
                            $message = '<font color="red">更新に失敗しました。</font>';
                        }
                    }
                }
                ?>

                <form method="post" action="">
                
                    <div class="form-group">
                        <label for="nickname" style="font-size:20px; margin-top:40px;">ニックネーム</label>
                        <div class="d-flex align-items-center">
                            <input type="text" readonly class="form-control <?php echo $nicknameError ? 'is-invalid' : ''; ?>" name="nickname" style="flex-grow: 1; background-color:white" placeholder="<?php echo $nicknameError ? $nicknameError : ''; ?>" value="<?php echo htmlspecialchars($nickname, ENT_QUOTES); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comment" style="font-size:20px; margin-top:40px;">コメント</label>
                        <div class="d-flex align-items-center">
                            <textarea readonly class="form-control  <?php echo $commentError ? 'is-invalid' : ''; ?>" name="comment" style="flex-grow: 1; resize: none; background-color:white" placeholder="<?php echo $commentError ? $commentError : ''; ?>" rows="1"><?php echo htmlspecialchars($comment, ENT_QUOTES); ?></textarea>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center" style="margin-top: 50px;">
                        <button type="button" onclick="history.back()" class="btn btn-primary" style="width: 6%; height: 3%; font-size: 15px;">戻る</button>
                        <div style="margin-left: 20px;">
                            <?php echo $message ?? ''; ?>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <style>
        .is-invalid {
            border-color: red;
        }
        .is-invalid::placeholder {
            color: red;
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