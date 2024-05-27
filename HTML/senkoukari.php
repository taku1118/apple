<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選考状況</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
</head>

<body>
    <style>
        /* styles.css */

        .g-col-4 {}


        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .sidebar .nav-link:hover {
            background-color: #0069d9;
            color: #fff;
        }

        .search-bar {
            display: flex;
            flex-direction: column;
            float: left;
        }


        .card-deck {
            width: 100%;
        }

        .card-title {
            font-weight: bold;
        }

        .status p {
            margin: 0;
        }

        .text-muted {
            font-size: 0.8em;
        }

        textarea {
            margin-top: 10px;
        }
    </style>

    <div class="container-fluid">
        
    <?php require 'sidebars.php'; ?>
            <!-- Main content -->
            <div class="mt-4">
                <form class="form-inline">

                    <input type="text" class="form-control" style="width: 95%;" placeholder="キーワードで検索">

                    <button class="btn shadow btn-success">検索</button>

                </form>

                <div class="d-flex justify-content-start w-75 mb-4">
                    <button class="btn shadow btn-success">+ 追加</button>
                </div>
                <div class="card-deck w-75">
                    <!-- Card 1 -->
                    <button class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title">株式会社〇〇〇〇〇〇</h5>
                            <div class="status">
                                <p>1次: エントリーシート <span class="text-muted">締切 3/9</span></p>
                                <p>2次: グループ面接 <span class="text-muted">締切 4/5</span></p>
                            </div>
                            <textarea class="form-control" rows="2" placeholder="メモ"></textarea>
                        </div>
                    </button>
                    <!-- Card 2 -->
                    <button class="card shadow mb-4">
                        <div class="card-body">
                            <h5 class="card-title">株式会社〇〇〇〇〇〇</h5>
                            <div class="status">
                                <p>1次: エントリーシート <span class="text-muted">締切 3/9</span></p>
                                <p>2次: 面接 <span class="text-muted">日付 4/5</span></p>
                            </div>
                            <textarea class="form-control" rows="2" placeholder="メモ"></textarea>
                        </div>
                    </button>
                </div>
            </div>
        <!-- </div> -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>