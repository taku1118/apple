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
    <?php require 'db-connect.php' ?>
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
    <?php
    $student_num = "0000000";
                $sql=$pdo->prepare("SELECT * FROM personal_inform where student_number=?");

                $sql->execute([$student_num]);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            ?>
    
    <body style="background-color: #E6ECF0;">
    <div class="container-fluid" style="margin-top:20px;">
        <div class="row">
            <main class="col-md-10 mx-auto" style="padding: 20px;">
            <h1 class="title" style="margin-left:360px;">プロフィール</h1>
            <!-- ここからforeach -->
            <?php
                foreach ($result as $row) {
                    $profileimg = htmlspecialchars($row['profile_img']);
                    $nick_name = htmlspecialchars($row['nickname']);
                    $comment = htmlspecialchars($row['my_comment']);
                    $schoolname = htmlspecialchars($row['school_name']);
                    $graduate = htmlspecialchars($row['graduate_date']);
                }
                ?>
                
               
                <form>
                    <div class="form-group">
                        <div class="d-flex flex-column align-items-left">
                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center" id="profilePictureDisplay" style="width: 100px; height: 100px; overflow: hidden;">
                                <span id="profilePicturePlaceholder" class="text-white">画像</span>
                                <img id="profilePicturePreview" src="<?php echo $profileimg; ?>" style="width: 100%; height: 100%; object-fit: cover; <?php echo $profileimg ? '' : 'display: none;'; ?>">
                            </div>
                            <input type="file" class="form-control-file d-none" id="profilePicture" accept="image/*" onchange="previewImage(event)">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" style="font-size:20px;margin-top:20px">ニックネーム</label>
                        <div class="d-flex align-items-center">
                        <input type="text" readonly class="form-control"  id="username"  value="<?php echo $nick_name; ?>" style="flex-grow: 1; color:block; background-color:white">
                        </div>
                    </div>

                    <div class="form-group" style="font-size:20px; margin-top:20px">
                        <label for="message">コメント</label>
                        <div class="d-flex align-items-center">
                            <textarea class="form-control" readonly id="comment" value="<?php echo $comment; ?>" style="flex-grow: 1;resize: none; color:block;background-color:white" rows="1"><?php echo $comment; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group" style="font-size:20px; margin-top:20px">
                        <label for="school">所属学校</label>
                        <div class="d-flex align-items-center">
                            <input type="text" readonly class="form-control" id="school" value="<?php echo $schoolname; ?>" style="flex-grow: 1; color:block; background-color:white">
                        </div>
                    </div>

                    <div class="form-group" style="font-size:20px; margin-top:20px">
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
                    

                    <div class="form-group" style="font-size:20px; margin-top:20px">
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