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

    <!-- sidebar.CSS -->
    <link href="../CSS/sidebars.css" rel="stylesheet">

    <!-- DB接続 -->
    <?php require 'db-connect.php'; ?>

    <!-- common.CSS -->
    <link href="../CSS/common.css" rel="stylesheet">

    <style>
        #exam-report{
            width: 100%;
            max-width: 720px;
            font-size: 2vw;
            padding: 0;
        }
        @media (min-width: 768px) {
            #exam-report{
            font-size: 1.2vw;
            }
        }
        .autocomplete-suggestions {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            background-color: #e9eef4;
            position: absolute;
            z-index: 1000;
            border-radius: 10px;
        }
        .autocomplete-suggestion {
            padding: 8px;
            cursor: pointer;
        }
        .autocomplete-suggestion:hover {
            background-color: #f0f0f0;
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
<div class="mt-3 mb-3 mx-3">
    <div class="card px-4 py-3 mx-auto" style="max-width: calc(720px + 2rem);">
        <div id="exam-report" class="container-fluid">
            <form action="report-confirm.php" method="post" class="d-flex flex-column" style="height:100%;">
                <div>
                    <h1 class="mb-3">受験報告作成</h1>
                </div>
                <div class="mb-3">
                    <label for="companyName" class="form-label"><span class="fw-bold">企業名(検索)</span><br>・・・選択肢にない場合は担任に連絡してください。</label>
                    <input type="text" class="form-control" id="companyName" name="companyName" required autocomplete="off">
                    <input type="hidden" id="companyId" name="companyId">
                    <div id="companySuggestions" class="autocomplete-suggestions"></div>
                    <button id="enableCompanyNameBtn" class="btn btn-primary mt-2">企業名をクリア</button>
                </div>
                <div class="mb-3">
                    <label for="examDate" class="form-label"><span class="fw-bold">受験日</span></label>
                    <input type="date" class="form-control" id="examDate" name="examDate" required>
                </div>
                <div class="mb-3">
                    <label for="applicationMethod" class="form-label"><span class="fw-bold">応募方法</span></label>
                    <select class="form-select" id="applicationMethod" name="applicationMethod" required>
                        <option value="学校求人">学校求人</option>
                        <option value="縁故">縁故</option>
                        <option value="自己開拓">自己開拓</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="examStep" class="form-label"><span class="fw-bold">試験次数</span></label>
                    <select class="form-select" id="examStep" name="examStep" required>
                        <option value="1次試験">1次試験</option>
                        <option value="2次試験">2次試験</option>
                        <option value="3次試験">3次試験</option>
                        <option value="最終試験">最終試験</option>
                        <option value="適性検査">適性検査</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="examType" class="form-label"><span class="fw-bold">試験分類</span></label>
                    <select class="form-select" id="examType" name="examType" required>
                        <option value="個人面接">個人面接</option>
                        <option value="集団面接">集団面接</option>
                        <option value="面談">面談</option>
                        <option value="筆記試験">筆記試験</option>
                        <option value="実技試験">実技試験</option>
                        <option value="インターン">インターン</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="examContent" class="form-label"><span class="fw-bold">試験内容</span><br>・・・面接で質問された事項、試験で出た問題をできる限り書いてください。</label>
                    <textarea class="form-control" id="examContent" name="examContent" rows="5" required></textarea>
                </div>    
                <div class="mb-3">
                    <label for="impression" class="form-label"><span class="fw-bold">受験後の感想(所感)</span><br>・・・感じたこと及び今後の受験者へのアドバイス</label>
                    <textarea class="form-control" id="impression" name="impression" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="remarks" class="form-label"><span class="fw-bold">備考</span></label>
                    <input type="text" class="form-control" id="remarks" name="remarks">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" style="width:20%;">確認画面へ</button>
                </div>
            </form>
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

    <!-- 企業名を検索してフォームに追加するスクリプト -->
    <script>
        $(document).ready(function() {
            $('#companyName').on('input', function() {
                var searchTerm = $(this).val();
                if (searchTerm.length >= 1) { // 1文字以上で検索を実行
                    $.ajax({
                        url: 'search_companies.php',
                        method: 'GET',
                        data: { term: searchTerm },
                        dataType: 'json',
                        success: function(data) {
                            console.log(data); // 返ってきたデータをコンソールに出力して確認
                            var suggestions = $('#companySuggestions');
                            suggestions.empty();
                            if (Array.isArray(data) && data.length > 0) {
                                data.forEach(function(company) {
                                    suggestions.append('<div class="autocomplete-suggestion" data-id="' + company.company_id + '">' + company.company_name + '</div>');
                                });
                                $('.autocomplete-suggestion').click(function() {
                                    var selectedCompanyName = $(this).text();
                                    var selectedCompanyId = $(this).data('id');
                                    $('#companyName').val(selectedCompanyName).prop('disabled', true);
                                    $('#companyId').val(selectedCompanyId);
                                    suggestions.empty(); // サジェストをクリア
                                    $('#enableCompanyNameBtn').prop('disabled', false); // ボタンを有効化
                                });
                            } else {
                                suggestions.append('<div class="no-suggestions">該当企業がありません</div>');
                            }
                        },
                        error: function() {
                            alert('企業名の取得に失敗しました');
                        }
                    });
                } else {
                    $('#companySuggestions').empty(); // 検索語が1文字未満の場合、サジェストをクリア
                }
            });

            // 企業名入力欄を再度有効化するボタンのクリックイベント
            $('#enableCompanyNameBtn').click(function() {
                $('#companyName').prop('disabled', false).val(''); // 入力欄を有効化して、値をクリアする
                $('#companyId').val(''); // 企業IDもクリアする（必要に応じて）
            });
        });
    </script>

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>