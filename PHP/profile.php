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
    <?php
    $student_num = $_SESSION['user']['student_number'];
                $sql=$pdo->prepare("SELECT * FROM personal_inform where student_number=?");

                $sql->execute([$student_num]);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            ?>
    
    <body style="background-color: #E6ECF0;">
    <div class="container-fluid" style="margin-top:20px; ">
        <div class="row">
            <main class="col-md-10 mx-auto" style="padding: 20px;">
            <h1 class="title" style="text-align:center; margin-bottom: 30px; background-color:#2A57A4;color:white;">プロフィール</h1>
            <!-- ここからforeach -->
            <?php
                foreach ($result as $row) {
                    $profileimg = $_SESSION['user']['profile_img'];
                    $nick_name = $_SESSION['user']['nickname'];
                    $comment = htmlspecialchars($row['my_comment']);
                    $schoolname = htmlspecialchars($row['school_name']);
                    $graduate = htmlspecialchars($row['graduate_date']);
                }
                ?>
                
               
                <form>
                    <div class="form-group">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center" id="profilePictureDisplay" style="width: 150px; height: 150px; overflow: hidden;">
                                <!-- <span id="profilePicturePlaceholder" class="text-white">画像</span>-->
                                <img id="profilePicturePreview" src="../IMAGE/PROFILE/<?php echo $profileimg; ?>" style="width: 100%; height: 100%; object-fit: cover; ">
                                <!-- <input type="file" readonly class="form-control-file d-none" id="profilePicture" value="<?php echo $profileimg; ?>"> -->
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" style="font-size:20px;margin-top:20px">ニックネーム</label>
                        <div class="d-flex align-items-center">
                        <input type="text" readonly class="form-control"  id="username"  value="<?php echo $nick_name; ?>" style="flex-grow: 1; color:block; background-color:white">
                        </div>
                    </div>

                    <div class="form-group" style="font-size:20px; margin-top:30px">
                        <label for="message">コメント</label>
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
                    $sql=$pdo->prepare("SELECT * FROM licence_inform WHERE student_number=?");
                    $sql->execute([$student_num]);
                    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    

                    <div class="form-group" style="font-size:20px; margin-top:30px">
                        <label for="qualifications">保有資格</label>
                        <?php foreach ($result as $row) :
                            $licencename = htmlspecialchars($row['licence_name']);
                        ?>
                        <div class="d-flex align-items-center">
                            <input type="text" readonly class="form-control" id="qualifications" value="<?php echo $licencename; ?>" style="flex-grow: 1; margin-bottom:1px; color:block; background-color:white">
                        </div>
                        <?php endforeach; ?>
                    </div>
                   
                    

                    <div class="d-flex" style="margin-top:3%;">
                        <button type="button" onclick="history.back()" class="btn btn-primary" style="width: 6%; height: 3%; font-size: 15px; margin-right: 1rem;">戻る</button>
                    </div>
                    
                </form>
            </main>
        </div>
    </div>
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

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>