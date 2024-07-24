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
        .background-image {
            background-image: url("../IMAGE/kaisya2.jpg");
            background-size: cover;
            height: 200px;
            width: 100%;
        }

        .fontMainTitle{
            color: white;
            font-weight: bold;
        }

        .element {
            max-height: 290px;

            overflow-y: scroll;
            /* IE, Edge 対応 */
            -ms-overflow-style: none;
            /* Firefox 対応 */
            scrollbar-width: none;
        }
        .hidden {
            display: none;
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
            <div class="background-image d-flex align-items-center">
                <h1 class="ms-4 fs4 fontMainTitle">選考状況</h1>
            </div>
            <div class="container-fluid p-4">
            <?php
                $student_number = $_SESSION['user']['student_number'];
                $select_state = $pdo->prepare('SELECT * FROM Adopt_State where student_number = ?');
                $select_state->execute([$student_number]);
                $select_state = $select_state->fetchAll(PDO::FETCH_ASSOC);

                $select_state_modal = $select_state;
            ?>
                <!-- Main content -->
                <div class="mt-4">
                    <!-- <form class="form-inline">
                        <div class="d-flex flex-row mb-3">
                            <input type="text" class="form-control border border-primary border-3" style="width: 75%;" placeholder="キーワードで検索">
                            <button class="btn shadow btn-primary" style="width:100px;">検索</button>
                        </div>
                    </form> -->

                    <div class="d-flex justify-content-start w-100 mb-4">
                        <button type="button" class="btn shadow btn-success" data-bs-toggle="modal" id="newsheet" data-bs-target="#insert_modal">+ 追加</button>
                    </div>

                    <!-- 新規モーダル用 -->
                    <div class="modal fade" id="insert_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content w-75">
                                <div class="modal-header" style="border-bottom:unset">
                                    <input type="text" class="modal-title form-control form-control-lg" placeholder="企業名" style="--bs-border-color: #1dc219;">
                                </div>
                                <div class="modal-body">
                                    <div id="adopt_area_1" class="onload_area1">
                                        <div class="card-text position-relative" id="input_adopt_step_id">
                                            <input type="date" class="form-control" style="width: 30%; margin-left: 69%;" id="date_adopt_id_adopt_step_id">
                                            <input type="text" class="form-control form-control-lg" id="step_adopt_id_adopt_step_id" placeholder="選考状況" style="--bs-border-color: #1dc219;">
                                            <button onclick="new_delete_input(this)" class="btn btn-danger position-absolute top-50 start-100 translate-middle btn-sm rounded-5" id="delete_adopt_id_1">✕</button>
                                        </div>        
                                    </div>
                                    <!-- 追加ボタン -->
                                    <div class="mx-auto text-center">
                                        <button type="button" id="add_input_adopt_id" class="btn" onclick="new_add_input(this)"><i class="bi bi-plus-circle" style="font-size: 2rcap;"></i></button>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-start" style="--bs-border-color: #1dc219;border-top:var(--bs-modal-footer-border-width) dashed #1dc219;">
                                    <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="--bs-border-color: #1dc219;" placeholder="やること"></textarea>
                                </div>
                            </div>
                            <div class="modal-content w-25 align-items-center" style="background-color: #11ffee00;border: #11ffee00;">
                                <button type="button" class="btn btn-danger rounded-5 mb-2" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                                <button class="btn btn-success rounded-5 mb-2" id="edit_btn_adopt_id" onclick="new_edit_sheet(this)" type="button"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-success rounded-5 mb-2" id="edit_btn_adopt_id" onclick="new_edit_sheet(this)" type="button"><i class="bi bi-eraser"></i></button>
                                <button class="btn btn-success rounded-5 mb-2" id="save_btn_adopt_id" onclick="new_save_sheet(this)" type="button"><i class="bi bi-upload"></i></button>
                            </div>
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                    <!-- 選考シート -->
                    

                    <div class="row row-cols-1 row-cols-md-2" id="sheet_display_area">
                        <?php foreach ($select_state as $row) : ?>
                            <?php
                            $select_detail = $pdo->prepare('SELECT * FROM Adopt_State_Details WHERE adopt_id= ?');
                            $select_detail->execute([$row['adopt_id']]);
                            $select_detail = $select_detail->fetchAll();
                            ?>
                            <div class="col" id="deleteArea<?= $row['adopt_id'] ?>">
                                <div class="card w-75 mx-auto" data-bs-toggle="modal" data-bs-target="#modal_num<?= $row['adopt_id'] ?>" onclick="open_sheet(this)" id="sheet_number<?= $row['adopt_id'] ?>">
                                    <div class="card-body" id="card_area<?= $row['adopt_id'] ?>">
                                        <h2 class="card-title my-5 text-center"><?= $row['company_name_txt'] ?></h2>
                                        <div class="onload_area">
                                            <?php foreach ($select_detail as $i => $detail) : ?>
                                                <div class="card-text pe-none">
                                                    <input type="text" class="form-control form-control-lg" id="Input" value="<?= $detail['adopt_way'] ?>">
                                                </div>
                                                <?php if ($i + 1 !== count($select_detail)) : ?>
                                                    <div class="text-center">
                                                        <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="mb-3 pe-none">
                                            <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $row['note'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>


                    <!-- モーダルの設定 -->
                    <?php foreach ($select_state_modal as $row) : ?>
                        <?php
                        $select_detail_modal = $pdo->prepare('SELECT * FROM Adopt_State_Details WHERE adopt_id= ?');
                        $select_detail_modal->execute([$row['adopt_id']]);
                        $select_detail_modal = $select_detail_modal->fetchAll();
                        ?>
                        <div class="modal fade" id="modal_num<?= $row['adopt_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog modal-dialog-centered" id="modal_dialog">
                                <div class="modal-content" id="modal_content">
                                    <div class="card w-100" id="card">
                                        <div class=" d-flex justify-content-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
                                        </div>
                                        <div class="card-body" id="edit_area<?= $row['adopt_id'] ?>">
                                            <h2 class="card-title my-5 text-center"><?= $row['company_name_txt'] ?></h2>
                                            <!-- テキストと矢印のブロック、この二つDivを削除する -->
                                            <?php foreach ($select_detail_modal as $x => $detail_modal) : ?>
                                                <div id="adopt_area<?= $row['adopt_id'] ?>_<?= $detail_modal['adopt_step_id'] ?>">
                                                    <div class="card-text position-relative" id="input_<?= $detail_modal['adopt_step_id'] ?>">
                                                        <input type="date" class="form-control" style="width: 30%; margin-left: 69%;" id="date_<?= $detail_modal['adopt_id'] ?>_<?= $detail_modal['adopt_step_id'] ?>" value="<?= $detail_modal['adopt_date'] ?>">
                                                        <input type="text" class="form-control form-control-lg" id="step_<?= $detail_modal['adopt_id'] ?>_<?= $detail_modal['adopt_step_id'] ?>" value="<?= $detail_modal['adopt_way'] ?>">
                                                        <button onclick="delete_input(this)" class="btn btn-danger position-absolute top-50 start-100 translate-middle btn-sm rounded-5" id="delete_<?= $detail_modal['adopt_id'] ?>_<?= $detail_modal['adopt_step_id'] ?>">✕</button>
                                                    </div>
                                                    <?php if ($x + 1 != count($select_detail_modal)) : ?>
                                                        <div class="text-center">
                                                            <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <!-- 追加ボタン -->
                                        <div class="mx-auto text-center">
                                            <button type="button" id="add_input<?= $row['adopt_id'] ?>" class="btn" onclick="add_input(this)"><i class="bi bi-plus-circle" style="font-size: 2rcap;"></i></button>
                                        </div>

                                        <div class="mb-3" id="note_<?= $row['adopt_id'] ?>">
                                            <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $row['note'] ?></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" id="edit_btn<?= $row['adopt_id'] ?>" onclick="edit_sheet(this)" type="button">編集</button>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" id="save_btn<?= $row['adopt_id'] ?>" onclick="save_sheet(this)" type="button">保存</button>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" id="delete_sheet_btn<?= $row['adopt_id'] ?>" onclick="DeleteSheet(this)" type="button">シート削除</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <?php endforeach; ?>
                </div>


                <!-- 新規シート用 -->
                <div class="template_sheet">
                    <div class="col d-none">
                        <div class="card w-75 mx-auto" data-bs-toggle="modal" data-bs-target="#modal_num" onclick="new_open_sheet()" id="sheet_number adopt_id">
                            <div class="card-body" id="card_area adopt_id">
                                <h2 class="card-title my-5 text-center">company_name_txt</h2>
                                <div>
                                    <div class="card-text pe-none">
                                        <input type="text" class="form-control form-control-lg" id="Input" value="">
                                    </div>
                                </div>
                                <div class="mb-3 pe-none">
                                    <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">note</textarea>
                                </div>
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

    <!-- シート内編集用のJS -->
    <script src="../SCRIPT/card_edit.js"></script>

    <!-- シート追加用のJS -->
    <script src="../SCRIPT/sheet_add.js"></script>


    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>