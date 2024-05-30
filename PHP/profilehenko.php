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

    <style>
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="content container-fluid">
<!----------------------------------------------------ここから-------------------------------------------------------------------->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    </script>
    <style>
        </style>
<body style="background-color: #E6ECF0;">
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-10 mx-auto" style="padding: 20px;">
                <h1>プロフィール</h1>
                <form>
                    <div class="form-group">
                        <div class="d-flex flex-column align-items-left">
                            <div class="rounded-circle bg-dark d-flex align-items-center justify-content-center" id="profilePictureDisplay" style="width: 100px; height: 100px; overflow: hidden;">
                                <span id="profilePicturePlaceholder" class="text-white">画像</span>
                                <img id="profilePicturePreview" style="width: 100%; height: 100%; object-fit: cover; display: none;">
                            </div>
                            <label for="profilePicture" class="btn btn-primary mt-3" style="width: 11%;">
                                <i class="fas fa-camera"></i> 写真を選択
                            </label>
                            <input type="file" class="form-control-file d-none" id="profilePicture" accept="image/*" onchange="previewImage(event)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">ユーザーネーム</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" id="username" value="りんごチュッパチャップス" style="flex-grow: 1;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="graduationYear">卒業年度</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" id="graduationYear" value="2025年卒業" style="flex-grow: 1;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="qualifications">保有資格</label>
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control" id="qualifications" value="基本情報技術者" style="flex-grow: 1;">
                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <input type="text" class="form-control" id="additionalQualifications" value="応用情報技術者" style="flex-grow: 1;">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 3%;">
                    <button type="submit" class="btn btn-primary" style="width: 10%;">変 更</button>
                    </div>

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