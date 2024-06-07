<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-primary-subtle">
    <div class="w-100">
        <div class="fs-1 mb-3 d-flex justify-content-end w-25" style="margin-left: 130px; margin-top: 5%;">所有するスキル</div>
        <!-- <form action="./マイページ画面.html" method="post" class="gap-3 mt-3 form-inline"> -->
        <div class="card shadow-sm p-5 m-auto" style="width: 40rem;"><!-- ここからCard -->
            <div class="card-body p-2">
                <div class="card-text" id="card_area">
                    <div class="row my-1" id="input_area"> <!-- ここでFor文を回す -->
                        <div class="col-10">
                            <input type="text" name="licences[]" class="form-control">
                        </div>
                        <div class="col">
                            <button type="button" id="remove_input"
                                class="remove_input btn btn-outline-dark d-none">✕</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto">
                <button type="button" id="add_input" class="btn"><i class="bi bi-plus-circle"
                        style="font-size: 2rcap;"></i></button>
            </div>

        </div>
        <div class="mt-4" style="margin-left: 56%;">
            <button type="button" onclick="location.href='./my_page_screen.html'" class="btn btn-success btn-lg">変更する</button>
            <button type="button" onclick="location.href='./my_page_screen.html'"
                class="btn btn-secondary btn-lg">キャンセル</button>
        </div>
        <!-- </form> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jquery.Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="../SCRIPT/ownership_skill.js"></script>
</body>

</html>