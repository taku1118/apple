<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<!-- DB接続 -->
<?php require 'db-connect.php'; ?>
<!-- joinを使ったviewを作るとupdataできない -->
<?php
    $id = $_GET['id'];
    if(empty($_POST["prefecture"])){
        $sql=$pdo->prepare('update Users set desire_state_industry=?, desire_state_jobtype=? where student_number = ?');
        $sql->execute([$_POST["industry"], $_POST["jobtype"], $id]);
    }else{
        $sql=$pdo->prepare('update Users set desire_state_prefecture=?, desire_state_industry=?, desire_state_jobtype=? where student_number = ?');
        $sql->execute([$_POST["prefecture"], $_POST["industry"], $_POST["jobtype"], $id]);
    }
    
?>

<body class="bg-primary-subtle">
    <div class="w-100">
        <div class="fs-1 mb-3 d-flex justify-content-end w-50" style="margin-left: 130px; margin-top: 5%;">希望する条件の入力が完了しました。</div>
        <button type="button" class="btn btn-success btn-lg" onclick="location.href='./my_page_screen.php'">マイページに戻る</button>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>