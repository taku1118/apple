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
        <div class="Scrollbox" style="height:100%;width:100%;overflow:auto;">
            <div class="w-100 d-flex justify-content-center align-items-center px-5 mt-3" style="height:15%;">
                <h1 class="title d-block w-100 mb-0" style="text-align:center;background-color:#2A57A4;color:white;max-width:640px;">プロフィール変更</h1>
           </div>
            <div class="d-flex justify-content-center mx-5 mb-3" style="min-height:85%;">
                <div style="width: 100%;min-width:320px;max-width:640px;"><!--  カードの幅を調整したいときはwidthを編集 -->
                    <?php
                    $number=$_SESSION['user']['student_number'];
                    $sql = $pdo->query("SELECT * FROM Personal_Inform where student_number=$number");
                    $res = $sql->fetch(PDO::FETCH_ASSOC);
                    $profileimg = $res['profile_img'];
                    ?>

                    <form class="mb-3" action="profileafter.php" method="post" enctype="multipart/form-data">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center" id="profilePictureDisplay" style="width: 150px; height: 150px; overflow: hidden;background-color:aliceblue">
                                <img id="profilePicturePreview" src="../IMAGE/PROFILE/<?php echo $profileimg; ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="profileimage" style="font-size:20px; margin-top:40px;">プロフィール画像</label>
                            <div class="d-flex align-items-center">
                                <input class="form-control" type="file" id="profileimage" name="profileimage" accept="image/*" onchange="previewProfileImage(event)">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="nickname" style="font-size:20px; margin-top:40px;">ニックネーム</label>
                            <div class="d-flex align-items-center">
                                <input type="text" class="form-control" id="nickname" name="nickname" style="flex-grow: 1;" value="<?php echo htmlspecialchars($res['nickname'], ENT_QUOTES); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="comment" style="font-size:20px; margin-top:40px;">コメント</label>
                            <div class="d-flex align-items-center">
                                <textarea class="form-control" id="comment" name="comment" style="flex-grow: 1; resize: none;" rows="1"><?php echo htmlspecialchars($res['my_comment'], ENT_QUOTES); ?></textarea>
                            </div>
                        </div>

                        <div style="text-align:center; margin-top: 40px;">
                            <a class="btn btn-secondary" href="my_page_screen.php">キャンセル</a>
                            <input type="submit" class="btn btn-primary  ms-3"  value="変 更">
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

        function previewProfileImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('profilePicturePreview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>