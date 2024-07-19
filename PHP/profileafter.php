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

    .is-invalid {
            border-color: red;
        }
        
    .is-invalid::placeholder {
            color: red;
    }
    </style>

<?php
                $number=$_SESSION['user']['student_number'];
                $nickname = '';
                $comment = '';
                $image_name = $_SESSION['user']['profile_img'];

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nickname = $_POST["nickname"];
                    $comment = $_POST["comment"];
                    $imageError = '';
                    $nicknameError = '';
                    $commentError = '';
                    $imageErrorFlag = true;
                    $nicknameErrorFlag = true;
                    $commentErrorFlag = true;

                    if (mb_strlen($nickname) > 30) {
                        $nicknameError = 'ニックネームは30文字以内で入力してください';
                        $nickname = '';
                        $nicknameErrorFlag = false;
                    } 

                    if (mb_strlen($comment) > 500) {
                        $commentError = 'コメントは500文字以内で入力してください';
                        $comment = '';
                        $commentErrorFlag = false;
                    } 

                    if(!empty($_FILES['profileimage']['name']) && ($nicknameErrorFlag && $commentErrorFlag)){
                        $uploaddir = '../IMAGE/PROFILE/';
                        //ファイル名をユニーク化
                        $str=$_FILES['profileimage']['name'];
                        $path_parts = pathinfo($str);
                        $random_name = uniqid(mt_rand());
                        $image_name = $random_name . '.' . $path_parts['extension'];
                        $uploadfile = $uploaddir . $image_name;
                        //imagesディレクトリにファイル保存
                        if (move_uploaded_file($_FILES['profileimage']['tmp_name'], $uploadfile)) {
                            $sql = $pdo->prepare("UPDATE Users SET profile_img=? WHERE student_number=$number");
                            if ($sql->execute([$image_name])) {
                                $_SESSION['user']['profile_img']=$image_name;
                            } else {
                                $message2 = '<h2 class="text-danger" style="text-align:center;margin-bottom:20px;">画像の更新に失敗しました。</h2>';
                                $imageErrorFlag = false;
                            }
                        } else {
                            $message2 = '<h2 class="text-danger" style="text-align:center;margin-bottom:20px;">画像の更新に失敗しました。</h2>';
                            $imageErrorFlag = false;
                        }
                    }

                    if (($nicknameErrorFlag && $commentErrorFlag) && $imageErrorFlag) {
                        $sql = $pdo->prepare("UPDATE Users SET nickname=?, my_comment=? WHERE student_number=$number");
                        if ($sql->execute([htmlspecialchars($nickname), htmlspecialchars($comment)])) {
                            $_SESSION['user']['nickname']=htmlspecialchars($nickname);
                            $message = '<h2 class="text-primary" style="text-align:center;margin-bottom:20px;">変更が完了しました</h2>';
                        } else {
                            $message = '<h2 class="text-danger" style="text-align:center;margin-bottom:20px;">更新に失敗しました。</h2>';
                        }
                    }else{
                        $message = '<h2 class="text-danger" style="text-align:center;margin-bottom:20px;">更新に失敗しました。</h2>';
                    }
                }
                ?>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
        <div class="Scrollbox" style="height:100%;width:100%;overflow:auto;">
            <div class="w-100 d-flex justify-content-center align-items-center px-5 mt-3" style="height:15%;">
                <h1 class="title d-block w-100 mb-0" style="text-align:center;background-color:#2A57A4;color:white;max-width:640px;">プロフィール変更</h1>
           </div>
            <div class="d-flex justify-content-center mx-5 mb-3" style="min-height:85%;">
                <div style="width: 100%;min-width:320px;max-width:640px;"><!--  カードの幅を調整したいときはwidthを編集 -->
                    <div class="mb-3">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" id="profilePictureDisplay" style="width: 150px; height: 150px; overflow: hidden;background-color:aliceblue;">
                                <img id="profilePicturePreview" src="../IMAGE/PROFILE/<?php echo $image_name; ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="nickname" style="font-size:20px; margin-top:40px;">ニックネーム</label>
                            <div class="d-flex align-items-center">
                                <input type="text" readonly class="form-control <?php echo $nicknameError ? 'is-invalid' : ''; ?>" name="nickname" style="flex-grow: 1;" placeholder="<?php echo $nicknameError ? $nicknameError : ''; ?>" value="<?php echo htmlspecialchars($nickname, ENT_QUOTES); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comment" style="font-size:20px; margin-top:40px;">コメント</label>
                            <div class="d-flex align-items-center">
                                <textarea readonly class="form-control <?php echo $commentError ? 'is-invalid' : ''; ?>" name="comment" style="flex-grow: 1; resize: none;" placeholder="<?php echo $commentError ? $commentError : ''; ?>" rows="1"><?php echo htmlspecialchars($comment, ENT_QUOTES); ?></textarea>
                            </div>
                        </div>

                        <div style="text-align:center; margin-top: 40px;">
                            <?php echo $message ?? ''; ?>
                            <?php echo $message2 ?? ''; ?>
                            <a href="my_page_screen.php" class="btn btn-primary" style="font-size:20px;">マイページへ</a>
                        </div>
                    </div>
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