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
    .font {
            color: rgb(45, 55, 64);
            font-weight: bold;
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
    <?php
                // デバッグのためにエラー表示を有効にする
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                // データベースからテキスト情報を取得
                $personal_inform = $pdo->prepare('SELECT * FROM Personal_Inform where student_number = ?');
                $personal_inform->execute([$_SESSION['user']['student_number']]);
                $fetch_data = $personal_inform->fetch(PDO::FETCH_ASSOC);

                // データベースから県情報を取得
                $sql = $pdo->query('SELECT * FROM Prefectures');
                $res = $sql->fetchAll(PDO::FETCH_ASSOC);

                // データベースからid情報を取得
                $gender_inform = $pdo->prepare('SELECT gender , address, job_hunt, job_offer FROM Users WHERE student_number = ?');
                $gender_inform->execute([$_SESSION['user']['student_number']]);
                $fetch_data2 = $gender_inform->fetch(PDO::FETCH_ASSOC);

                // genderの値をデバッグ表示
                // echo 'Gender value: ' . htmlspecialchars($fetch_data2['gender']);

                $year = substr($fetch_data['birthday'], 0, 4);
                $month = substr($fetch_data['birthday'], 5, 2);
                $day = substr($fetch_data['birthday'], 8, 2);
                $gyaer = substr($fetch_data['graduate_date'], 0, 4);
                
    ?>

    <div class="d-flex justify-content-center py-5" style="width:100%;overflow:auto;">
        <div class="card shadow p-0" style="width: 90%;min-width:320px;max-width:960px;height: fit-content;"><!--  カードの幅を調整したいときはwidthを編集 -->
            <h2 class="font pt-5 ps-5 m-0">あなたの情報変更</h2>
            <form class="px-5 my-0" action="personal_information_change_screen_process.php" method="post" >
                <div id="card_area">
                    <div class="row my-3"> <!-- ここでFor文を回す -->
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">性別</span>
                        </div>
                        <div class="col-8">
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="male" value="0" <?php if ($fetch_data2['gender'] == "0") echo 'checked'; ?>>
                                <label for="male" class="form-check-label">男性</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="female" value="1" <?php if ($fetch_data2['gender'] == "1") echo 'checked'; ?>>
                                <label for="female" class="form-check-label">女性</label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">現住所</span>
                        </div>
                        <div class="col-8">
                            <select class="form-select" name="address" id="address">
                                <?php foreach($res as $row): ?>
                                    <option value="<?= $row['prefecture_id'] ?>" <?php if($row['prefecture_id'] == $fetch_data2['address']):?>selected<?php endif ?>>
                                        <?= $row['prefecture_name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">生年月日</span>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-auto gx-2">
                                    <select class="form-select" id="birth-year" name="birth-year">
                                        <option value="<?php echo $year; ?>" selected><?php echo $year;?></option>
                                        <?php
                                        $num = 1990;
                                        $strnum = strval($num);
                                        echo '<option value=',$strnum,'>',$strnum,'</option>';
                                        while($num != 2024){
                                            $num++;
                                            $strnum = strval($num);
                                            
                                            echo '<option value=',$strnum,'>',$strnum,'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-auto gx-2 my-auto">
                                    <span>年</span>
                                </div>
                                <div class="col-auto gx-2">
                                    <select class="form-select" id="birth-month" name="birth-month">
                                        <option value="<?php echo $month; ?>" selected><?php echo $month;?></option>
                                         <?php
                                        $num2 = 1;
                                        $strnum2 = "0".strval($num2);
                                        echo '<option value=',$strnum2,'>',$strnum2,'</option>';
                                        while($num2 != 12){
                                            $num2++;
                                            $strnum2 = strval($num2);
                                            if(mb_strlen($strnum2) == 1){
                                                $strnum2 ="0".$strnum2;
                                            }               
                                            echo '<option value=',$strnum2,'>',$strnum2,'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-auto gx-2 my-auto">
                                    <span>月</span>
                                </div>
                                <div class="col-auto gx-2">
                                    <select class="form-select" id="birth-day" name="birth-day">
                                        <option value="<?php echo $day?>" selected><?php echo $day?></option>
                                        <?php
                                        $num3 = 1;
                                        $strnum3 = "0".strval($num3);
                                        echo '<option value=',$strnum3,'>',$strnum3,'</option>';
                                        while($num3 != 31){
                                            $num3++;
                                            $strnum3 = strval($num3);
                                            if(mb_strlen($strnum3) == 1){
                                                $strnum3 ="0".$strnum3;
                                            }  
                                            echo '<option value=',$strnum3,'>',$strnum3,'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-auto gx-2 my-auto">
                                    <span>日</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">卒業予定年</span>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-auto gx-2">
                                    <select class="form-select" id="gyear" name="gyear" disabled>
                                        <option value=<?php $gyaer ?> selected><?php echo $gyaer ;?></option>
                                        <?php
                                        $gnum = 2025;
                                        $gstrnum = strval($gnum);
                                        while($gnum != 2028){
                                            $gnum++;
                                            $gstrnum = strval($gnum);
                                            if($gyear != $gstrnum){
                                            echo '<option value=',$gstrnum,'>',$gstrnum,'</option>';
                                           }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-auto gx-2 my-auto">
                                    <span>年</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">学校名</span>
                        </div>
                        <div class="col-8">
                        <?php
                                $sname = $fetch_data['school_name'];

                                $school = $pdo->prepare('SELECT school_id FROM Schools WHERE school_name = :sname');
                                $school->execute([':sname' => $sname]);
                                
                                $sid = $school->fetch(PDO::FETCH_ASSOC);
                                if ($sid !== false) {
                                    $sid = $sid['school_id']; 
                                
                                    $sql2 = $pdo->prepare('SELECT * FROM Schools WHERE school_id <> :sid');
                                    $sql2->execute([':sid' => $sid]);
                                
                                    $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
                                } else {
                                   
                                    echo '学校が見つかりませんでした。';
                                }
                        ?>
                            <select class="form-select" id="school" disabled>
                            <option value=<?php $sid ?>selected><?php echo htmlspecialchars($fetch_data['school_name']); ?>  </option>
                            <?php foreach($res2 as $row2): ?>
                                <option value="<?= $row2['school_id'] ?>"><?= $row2['school_name'] ?></option>
                                <?php endforeach; ?>
                          
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">学科</span>
                        </div>
                        <div class="col-8">
                        <?php
                            $cname = $fetch_data['course_name'];

                            $course = $pdo->prepare('SELECT course_id FROM Courses WHERE course_name = :cname');
                            $course->execute([':cname' => $cname]);

                            $cid = $course->fetch(PDO::FETCH_ASSOC);
                            if ($cid !== false) {
                                $cid = $cid['course_id']; 

                                $sql3 = $pdo->prepare('SELECT * FROM Courses WHERE course_id <> :cid');
                                $sql3->execute([':cid' => $cid]);

                                $res3 = $sql3->fetchAll(PDO::FETCH_ASSOC);
                            } else {
                                echo '学校が見つかりませんでした。';
                            }
                            ?>
                            <select class="form-select" id="gakka" disabled>
                                <option value="<?php echo htmlspecialchars($cid); ?>" selected><?php echo htmlspecialchars($fetch_data['course_name']); ?></option>
                                <?php foreach($res3 as $row3): ?>
                                    <option value="<?= htmlspecialchars($row3['course_id']) ?>"><?= htmlspecialchars($row3['course_name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">就活状況</span>
                        </div>
                        <div class="col-8">
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="syuRadioOptions" id="hut_job"
                                    value="1"
                                    <?php if ($fetch_data2['job_hunt'] != "0") : ?>
                                        checked
                                    <?php endif; ?>>
                                <label for="hut_job" class="form-check-label">就職活動中</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="syuRadioOptions" id="none_job"
                                    value="0"
                                    <?php if ($fetch_data2['job_hunt'] == "0") : ?>
                                        checked
                                    <?php endif; ?>>
                                <label for="none_job" class="form-check-label">就職活動中ではない</label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <span class="fs-4" style="white-space: nowrap;">内定有無</span>
                        </div>
                        <div class="col-8">
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="naiRadioOptions" id="hold_scout"
                                    value="1"  
                                    <?php if ($fetch_data2['job_offer'] != "0") : ?>
                                        checked
                                    <?php endif; ?>>
                                <label for="hold_scout" class="form-check-label">内定あり</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="naiRadioOptions" id="none_scout"
                                    value="0"
                                    <?php if ($fetch_data2['job_offer'] == "0") : ?>
                                        checked
                                    <?php endif; ?>>
                                <label for="none_scout" class="form-check-label">内定なし</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-5">
                    <a class="btn btn-secondary" href="my_page_screen.php">キャンセル</a>
                    <button class="btn btn-primary ms-3" id="change_confirm" type="submit">確定</button>
                </div>
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

    <!-- DB切断 -->
    <?php $pdo = null;?>
</body>
</html>