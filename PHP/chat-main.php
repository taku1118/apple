<?php session_start(); ?>
<!doctype html>
<html lang="ja" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>チャットアプリ</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="../CSS/reset.css"/>
    
    <!-- bootstrap.CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- common.CSS -->
    <link href="../CSS/common.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

    <style>
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .messages {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            background-color: #f8f9fa;
        }
        .message {
            position: relative;
            padding: 10px 20px;
            margin: 5px 0;
            border-radius: 10px;
            max-width: 60%;
            word-wrap: break-word;
        }
        .message-sent {
            margin-left: auto;
            background-color: #C3F69D;
            align-self: flex-end;
        }
        .message-sent::after {
            content: '';
            position: absolute;
            right: 10px;
            width: 0;
            height: 0;
            top: 13px;
            border: 10px solid transparent;
            border-left-color: #C3F69D;
            border-right: 0;
            translate: 100% -50%;
            border-width: 0 0 20px 20px;
        }
        .message-received {
            margin-right: auto;
            background-color: #EFEFEF;
            align-self: flex-start;
            position: relative;
            padding: 10px 20px;
            margin: 5px 0;
            border-radius: 10px;
            max-width: 60%;
            word-wrap: break-word;
        }

        .message-received::before {
            content: '';
            position: absolute;
            left: 10px;
            width: 0;
            height: 0;
            top: 13px;
            border: 10px solid transparent;
            border-right-color: #EFEFEF;
            border-left: 0;
            translate: -100% -50%;
            border-width: 0 20px 20px 0;
        }

        .message-input {
            display: flex;
        }
        .message-input textarea {
            flex: 1;
            resize: none;
        }
        .message-input button {
            margin-left: 10px;
        }
        .chat-room-list {
            overflow-y: auto;
            max-height: 100vh;
        }
        .chat-room {
            display: flex;
            align-items: center;
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
            <div class="row m-0" style="height: 100%;">
                <div class="col-3 chat-room-list bg-light p-0 d-flex flex-column">
                    <h5 class="m-3">チャットルーム</h5>
                    <ul id="chat-room-list" class="list-group flex-grow-1">
                        <!-- チャットルームリスト -->
                    </ul>
                </div>
                <div class="col-9 chat-container">
                    <div class="messages Scrollbox" id="messages">
                        <div id="scroll-inner">
                        <!-- メッセージが表示される -->
                        </div>
                    </div>
                    <form id="message-form" class="message-input p-3">
                        <textarea id="message" class="form-control" rows="1" placeholder="メッセージを入力..."></textarea>
                        <button type="submit" class="btn btn-primary">送信</button>
                    </form>
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

    <!-- Chat Script -->
    <script>
        // PHPのセッション情報をJavaScriptに渡す
        var currentUser = <?php echo json_encode($_SESSION['user']['student_number']); ?>;
    </script>
    <script src="../SCRIPT/chat.js"></script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>
