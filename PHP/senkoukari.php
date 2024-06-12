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

    .element{
        max-height:290px;
       
        overflow-y: scroll;
        /* IE, Edge 対応 */
        -ms-overflow-style: none;
        /* Firefox 対応 */
        scrollbar-width: none;
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

                <!-- 選考シート -->
        <?php
        $student_number ='0000000';
        $sql = $pdo->prepare('SELECT * FROM adopt_state WHERE student_number= ?');
        $sql -> execute([$student_number]);
        $sql = $sql->fetchAll();
        $modal_sql = $sql;
        foreach($sql as $row1){
            echo '<div class="col">';
            echo '<div class="card w-75 mb-3 shadow" data-bs-toggle="modal" data-bs-target="#',$row1['adopt_id'],'">';
            echo '<div class="card-body">';
            echo '<h2 class="card-title my-3 text-center">',$row1['company_name_txt'],'</h2>';
            echo '<div class="element">';
            $sql2 = $pdo->prepare('SELECT * FROM adopt_state_details WHERE adopt_id= ?');
            $sql2 -> execute([$row1['adopt_id']]);
            $sql2 = $sql2->fetchAll();
            foreach($sql2 as $i=> $row2){
                echo '<div class="card-text pe-none">';
                echo '<input type="text" class="form-control form-control-lg border border-2 border-primary" id="Input" placeholder=',$row2['adopt_way'],'>';
                echo '</div>';
                if($i+1 !== count($sql2)){
                    echo '<div class="text-center">';
                    echo '<i class="bi bi-caret-down-fill" style="font-size: 2rem;"></i>';
                    echo '</div>';

                }
                


            }
            echo '<div class="mt-2 pe-none">';
            echo 'メモ';
            echo '<textarea class="form-control form-control-lg border border-2 border-primary fs-5" id="Input" rows=2 placeholder=メモ>',$row1['note'],'</textarea>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        
        }
        
        ?>

<?php foreach($modal_sql as $row1): ?>
    <?php
    $modal_sql_details = $pdo->prepare('SELECT * FROM adopt_state_details WHERE adopt_id= ?');
    $modal_sql_details -> execute([$row1['adopt_id']]);
    $modal_sql_details = $modal_sql_details->fetchAll();
    ?>
    <!-- モーダルの設定 -->
    <div class="modal fade" id="<?= $row1['adopt_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">


                <div class="card w-100">

                    <div class=" d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                    </div>
                    <div class="card-body">
                        <div class="card-text" id="sheet_content">
                            <h2 class="card-title"><?= $row1['company_name_txt'] ?></h2>
                            <?php foreach($modal_sql_details as $i => $row):  ?>
                                
                                <!-- ここから : 面接回数でループ-->
                                <div id="select_ways">
                                    <div class="card-text" id="sheet_content">
                                        <input type="text" class="form-control form-control-lg" id="Input"
                                            placeholder="入力プレースホルダの例" value="<?= $row['adopt_way'] ?>">
                                    </div>
                                    <!-- <div class="d-none" id="toggle_icon">
                                        <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                                    </div> -->
                                    
                                </div>
                                <?php if($i+1 !== count($modal_sql_details)) : ?>
                                    <div class="text-center">
                                        <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="mx-auto">
                                <button type="button" id="add_input" class="btn"><i class="bi bi-plus-circle"
                                style="font-size: 2rcap;"></i></button>
                            </div>
                                <!-- ここまで-->
                            
                        </div>



                        <div class="">
                            
                            <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $row1['note'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" id="edit_btn<?= $row['adopt_id'] ?>" onclick="edit_sheet(this)" type="button">編集</button>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-none" id="save_btn<?= $row['adopt_id'] ?>" onclick="save_sheet(this)" type="button">保存</button>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php endforeach; ?>
            </div>
        <!-- </div> -->
    </div>

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
   
  