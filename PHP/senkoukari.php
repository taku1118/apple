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
    
    <?php require 'db-connect.php'; ?>
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
          
    .background-image{
        background-image: url("../IMAGE/kaisya2.jpg");
        background-size: cover;
        height: 110px;
        width:1000px;
        padding-left:0px;   
        
    }

    .background-image h1{
        color:white;
       
    }

    
   
    
    </style>

</head>
<body>
    <!-- サイドバーとメインコンテンツのラッパー -->
    <div class="wrapper">
      <?php require 'sidebars.php'; ?>
        <!-- メインコンテンツ -->
        <main class="container-fluid main-content" style="padding: 0;">
         <!-- サイドバーとメインコンテンツのラッパー -->
    
         
            <div class="background-image d-flex align-items-center" >
                <h1 style="margin-left:2rem">選考状況</h1>

            </div>
    

       
    <div class="container-fluid" style="padding-left:70px; ">
   
        
   
            <!-- Main content -->
            <div class="mt-4">
                <form class="form-inline">
                    <div class="d-flex flex-row mb-3">
                        <input type="text" class="form-control border border-primary border-3" style="width: 75%;" placeholder="キーワードで検索">

                        <button class="btn shadow btn-primary" style="width:100px;" >検索</button>
                    </div>

                </form>

                <div class="d-flex justify-content-start w-75 mb-4">
                    <button class="btn shadow btn-primary" data-bs-toggle="modal" data-bs-target="#company_id">+ 追加</button>
                </div>
                <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <div class="card w-75 mb-3 shadow" data-bs-toggle="modal" data-bs-target="#company_id">
                <div class="card-body">
                    <h2 class="card-title my-3 text-center">株式会社○○○○</h2>

                    <div class="card-text pe-none">
                        <input type="text" class="form-control form-control-lg " id="Input" placeholder="入力プレースホルダの例">
                    </div>
                    <div class="text-center">
                        <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                    </div>
                    <div class="card-text pe-none">
                        <input type="text" class="form-control form-control-lg" id="Input" placeholder="入力プレースホルダの例">
                    </div>
                    <div class="text-center">
                        <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                    </div>
                    <div class="mb-3 pe-none">
                        <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card w-75 mb-3 shadow" data-bs-toggle="modal" data-bs-target="#company_id">
                <div class="card-body">
                    <h2 class="card-title my-3 text-center">株式会社○○○○</h2>

                    <div class="card-text pe-none">
                        <input type="text" class="form-control form-control-lg " id="Input" placeholder="入力プレースホルダの例">
                    </div>
                    <div class="text-center">
                        <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                    </div>
                    <div class="card-text pe-none">
                        <input type="text" class="form-control form-control-lg" id="Input" placeholder="入力プレースホルダの例">
                    </div>
                    <div class="text-center">
                        <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                    </div>
                    <div class="mb-3 pe-none">
                        <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card w-75 mb-3 shadow" data-bs-toggle="modal" data-bs-target="#company_id">
                <div class="card-body">
                    <h2 class="card-title my-3 text-center">株式会社○○○○</h2>

                    <div class="card-text pe-none">
                        <input type="text" class="form-control form-control-lg " id="Input" placeholder="入力プレースホルダの例">
                    </div>
                    <div class="text-center">
                        <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                    </div>
                    <div class="card-text pe-none">
                        <input type="text" class="form-control form-control-lg" id="Input" placeholder="入力プレースホルダの例">
                    </div>
                    <div class="text-center">
                        <i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>
                    </div>
                    <div class="mb-3 pe-none">
                        <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>

    <!-- モーダルの設定 -->
    <div class="modal fade" id="company_id" tabindex="-1" aria-labelledby="exampleModalLabel">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">


                <div class="card w-100">

                    <div class=" d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="card-body">
                        <div class="card-text" id="sheet_content">
                            <h2 class="card-title">株式会社○○○○</h2>

                            <!-- ここから : 面接回数でループ-->
                            <div id="select_ways">
                                <div class="card-text" id="sheet_content">
                                    <input type="text" class="form-control form-control-lg" id="Input"
                                        placeholder="入力プレースホルダの例" value="エントリーシート">
                                </div>
                                <!-- <div class="d-none" id="toggle_icon">
                                    <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                                </div> -->
                                
                            </div>
                            <div class="mx-auto">
                                <button type="button" id="add_input" class="btn"><i class="bi bi-plus-circle"
                                        style="font-size: 2rcap;"></i></button>
                            </div>
                            <!-- ここまで-->
                            
                        </div>



                        <div class="">
                            <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                    <button type="button" class="btn btn-primary">変更を保存</button>
                </div>/.modal-footer -->
            <!-- </div>/.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
            </div>
        <!-- </div> -->
    </div>
<
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
   
  