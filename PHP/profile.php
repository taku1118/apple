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

    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"/>

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
    $student_num = $_GET['student_number'];
    $sql=$pdo->prepare("SELECT * FROM Personal_Inform where student_number=?");
    $sql->execute([$student_num]);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    // ここからforeach
    foreach ($result as $row) {
        $profileimg = htmlspecialchars($row['profile_img']);
        $nick_name = htmlspecialchars($row['nickname']);
        $comment = htmlspecialchars($row['my_comment']);
        $schoolname = htmlspecialchars($row['school_name']);
        $graduate = htmlspecialchars($row['graduate_date']);
    }
?>    
            <div class="Scrollbox" style="height:100%;width:100%;overflow:auto;">
                <div class="w-100 d-flex justify-content-center align-items-center px-5 mt-3" style="height:15%;">
                    <h1 class="title d-block w-100 mb-0" style="text-align:center;background-color:#2A57A4;color:white;max-width:640px;">プロフィール</h1>
            </div>
                <div class="d-flex justify-content-center mx-5 mb-3" style="min-height:85%;">
                    <div style="width: 100%;min-width:320px;max-width:640px;"><!--  カードの幅を調整したいときはwidthを編集 -->
                        <div class="mb-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center" id="profilePictureDisplay" style="width: 150px; height: 150px; overflow: hidden;">
                                    <img id="profilePicturePreview" src="../IMAGE/PROFILE/<?php echo $profileimg; ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="nickname" style="font-size:20px;margin-top:20px">ニックネーム</label>
                                <div class="d-flex align-items-center">
                                <input type="text" readonly class="form-control"  id="nickname"  value="<?php echo $nick_name; ?>" style="flex-grow: 1; color:block; background-color:white">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="comment" style="font-size:20px; margin-top:30px;">コメント</label>
                                <div class="d-flex align-items-center">
                                    <textarea class="form-control" readonly id="comment" value="<?php echo $comment; ?>" style="flex-grow: 1;resize: none; color:block;background-color:white" rows="1"><?php echo $comment; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group" style="font-size:20px; margin-top:30px">
                                <label for="school">所属学校</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" readonly class="form-control" id="school" value="<?php echo $schoolname; ?>" style="flex-grow: 1; color:block; background-color:white">
                                </div>
                            </div>

                            <div class="form-group" style="font-size:20px; margin-top:30px">
                                <label for="graduationYear">卒業年度</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" readonly class="form-control" id="graduationYear" value="<?php echo $graduate; ?>" style="flex-grow: 1; color:block; background-color:white">
                                </div>
                            </div>

                            <?php
                            $sql=$pdo->prepare("SELECT * FROM Skill_Manage WHERE student_number=?");
                            $sql->execute([$student_num]);
                            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            

                            <div class="form-group" style="font-size:20px; margin-top:30px">
                                <label for="qualifications">保有スキル</label>
                                <?php foreach ($result as $row) :
                                    $licencename = htmlspecialchars($row['skill_name']);
                                ?>
                                <div class="d-flex align-items-center">
                                    <input type="text" readonly class="form-control" id="qualifications" value="<?php echo $licencename; ?>" style="flex-grow: 1; margin-bottom:1px; color:block; background-color:white">
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <div style="text-align:center; margin-top: 40px;">
                                <button type="button" onclick="history.back()" class="btn btn-primary" style="font-size:20px;">戻る</button>
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
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var dataURL = reader.result;
                var profilePicturePreview = document.getElementById('profilePicturePreview');
                profilePicturePreview.src = dataURL;
                profilePicturePreview.style.display = 'block';
                document.getElementById('profilePicturePlaceholder').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var textarea = document.getElementById('comment');

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