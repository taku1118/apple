<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php require('../../../PHP/db-connect.php') ?>

<body>
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
                            <?php foreach ($select_detail_modal as $x => $detail_modal) : ?>
                                <div class="card-text">
                                    <input type="text" class="form-control form-control-lg" id="step_<?= $detail_modal['adopt_id'] ?>_<?= $detail_modal['adopt_step_id'] ?>" value="<?= $detail_modal['adopt_way'] ?>">
                                </div>
                                <?php if ($x + 1 != count($select_detail_modal)) : ?>
                                    <div class="text-center">
                                        <i class="bi bi-caret-down-fill" style="font-size: 3rem;"></i>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">メモ</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $row['note'] ?></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" id="edit_btn<?= $row['adopt_id'] ?>" onclick="edit_sheet(this)" type="button">編集</button>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-none" id="save_btn<?= $row['adopt_id'] ?>" onclick="save_sheet(this)" type="button">保存</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php endforeach; ?>
    <?php
    $array = [100,200,300];
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="../JavaScript/選考方法追加.js"></script>
</body>

</html>