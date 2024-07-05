<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- DB接続 -->
<?php require 'db-connect.php'; ?>

<?php
    $sql = $pdo->query('SELECT * FROM prefectures');
    $res = $sql->fetchAll(PDO::FETCH_ASSOC);
    $sql2 = $pdo->query('SELECT * FROM industries');
    $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
    $sql3 = $pdo->query('SELECT * FROM jobtypes');
    $res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
    $id = $_SESSION['user']['student_number'];
?>

<body class="bg-primary-subtle">
    <div class="w-100">
        <div class="fs-1 mb-3 d-flex justify-content-end w-25" style="margin-left: 130px; margin-top: 5%;">希望する条件</div>
        <form action="suggested_condtion_process.php?id=<?=$id?>" method="post" class="gap-3 mt-3 form-inline">
        <div class="card shadow-sm p-5 m-auto" style="width: 40rem;"><!-- ここからCard -->
            <div class="card-body p-3">
                <p class="card-text">
                <div class="row my-5"> <!-- ここでFor文を回す -->
                    <div class="col">
                        <span class="fs-4">希望する勤務地</span>
                    </div>
                    
                    <div class="col">
                        <select class="form-select form-select-lg" id="exampleFormSelect1" name="prefecture">                          
                            <option selected>未定</option>
                            <?php foreach($res as $row): ?>
                            <option value="<?= $row['prefecture_id'] ?>"><?= $row['prefecture_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                </div>
                <div class="row my-5">
                    <div class="col">
                        <span class="fs-4">希望する業界</span>
                    </div>
                    <div class="col">
                        <select class="form-select form-select-lg" id="exampleFormSelect1" name="industry">
                            <option selected>未定</option>
                            <?php foreach($res2 as $row): ?>
                            <option value="<?= $row['industry_id'] ?>"><?= $row['industry_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col">
                        <span class="fs-4">希望する職種</span>
                    </div>
                    <div class="col">
                        <select class="form-select form-select-lg" id="exampleFormSelect1" name="jobtype">
                            <option selected>未定</option>
                            <?php foreach($res3 as $row): ?>
                            <option value="<?= $row['job_id'] ?>"><?= $row['job_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                </p>
            </div>
        </div>
        <div class="mt-4" style="margin-left: 59%;">
            <button type="button" class="btn btn-success btn-lg">変更する</button>
            <button type="button" onclick="history.back();"
                class="btn btn-secondary btn-lg">キャンセル</button>
        </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>