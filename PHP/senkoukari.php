<!doctype html>
<html lang="ja" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>テンプレート</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css" />

    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->

    <?php require 'db-connect.php'; ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        .background-image {
            background-image: url("../IMAGE/kaisya2.jpg");
            background-size: cover;
            height: 110px;
        }

        .background-image h1 {
            color: white;

        }

        .element {
            max-height: 290px;

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
            <div class="background-image d-flex align-items-center">
                <h1 style="margin-left:2rem">選考状況</h1>
            </div>
            <div class="container-fluid" style="padding-left:70px; ">
                <!-- Main content -->
                <div class="mt-4">
                    <form class="form-inline">
                        <div class="d-flex flex-row mb-3">
                            <input type="text" class="form-control border border-primary border-3" style="width: 75%;" placeholder="キーワードで検索">
                            <button class="btn shadow btn-primary" style="width:100px;">検索</button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-start w-75 mb-4">
                        <button class="btn shadow btn-primary" data-bs-toggle="modal" data-bs-target="#company_id">+ 追加</button>
                    </div>


                    <!-- 選考シート -->
                    <?php
                    $value = "0000000";
                    $select_state = $pdo->prepare('SELECT * FROM adopt_state where student_number = ?');
                    $select_state->execute([$value]);
                    $select_state = $select_state->fetchAll(PDO::FETCH_ASSOC);
                    $select_state_modal = $select_state;
                    ?>

                    <div class="row row-cols-1 row-cols-md-2">
                        <?php foreach ($select_state as $row) : ?>
                            <?php
                            $select_detail = $pdo->prepare('SELECT * FROM adopt_state_details WHERE adopt_id= ?');
                            $select_detail->execute([$row['adopt_id']]);
                            $select_detail = $select_detail->fetchAll();
                            ?>
                            <div class="col">
                                <div class="card w-75 mx-auto" data-bs-toggle="modal" data-bs-target="#modal_num<?= $row['adopt_id'] ?>" onclick="open_sheet(this)" id="sheet_number<?= $row['adopt_id'] ?>">
                                    <div class="card-body">
                                        <h2 class="card-title my-5 text-center"><?= $row['company_name_txt'] ?></h2>
                                        <div class="element">
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
                        $select_detail_modal = $pdo->prepare('SELECT * FROM adopt_state_details WHERE adopt_id= ?');
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
                                                <div id="adopt_area<?= $detail_modal['adopt_step_id'] ?>">
                                                    <div class="car d-text position-relative" id="input_<?= $detail_modal['adopt_step_id'] ?>">
                                                        <input type="text" class="form-control form-control-lg" id="step_<?= $detail_modal['adopt_id'] ?>_<?= $detail_modal['adopt_step_id'] ?>" value="<?= $detail_modal['adopt_way'] ?>">
                                                        <button onclick="delete_input(this)" class="btn btn-danger position-absolute top-0 start-100 translate-middle btn-sm rounded-5" id="delete_step_id<?= $detail_modal['adopt_step_id'] ?>">✕</button>
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
                                    </div>
                                </div>
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    <?php endforeach; ?>
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

    <script src="../SCRIPT/select_conditon.js"></script>

    <script src="../SCRIPT/add_form.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null; ?>
</body>

</html>