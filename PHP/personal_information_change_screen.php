<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require 'db-connect.php'; ?>
    <title>Document</title>
</head>

<body class="bg-primary-subtle">
      <?php
                 
                $personal_inform = $pdo->prepare('SELECT gender,address,birthday,graduate_date,school_name,course_name,job_hunt,job_offer FROM Personal_Inform where student_number = ?');
                $personal_inform->execute([$_SESSION['user']['student_number']]);
                $fetch_data = $personal_inform->fetch(PDO::FETCH_ASSOC);
                $sql = $pdo->query('SELECT * FROM prefectures');
                $res = $sql->fetchAll(PDO::FETCH_ASSOC);
                
                
            ?>


    <div class="">
        <div class="fs-1 mb-3" style="margin-left: 140px;">あなたの情報</div>
        <div class="card shadow-sm p-5 m-auto" style="width: 50rem;"><!-- ここからCard -->
            <div class="card-body px-5">
                <div class="card-text">
                    <div class="row my-3"> <!-- ここでFor文を回す -->
                        <div class="col-5">
                            <span class="fs-4">性別</span>
                        </div>
                        <div class="col">
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="male"
                                    value="option1">
                                <label for="male" class="form-check-label">男性</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="female"
                                    value="option2">
                                <label for="female" class="form-check-label">女性</label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-5">
                            <span class="fs-4">現住所</span>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" id="exampleFormSelect1">
                                <option selected><?php echo htmlspecialchars($fetch_data['address']); ?>  </option>
                                <?php foreach($res as $row): ?>
                                    <?php if($row['prefecture_name'] != $fetch_data['address']):?>
                                    <option value="<?= $row['prefecture_id'] ?>"><?= $row['prefecture_name'] ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-5">
                            <span class="fs-4">生年月日</span>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-auto gx-2">
                                    <?php
                                    $year = substr($fetch_data['birthday'], 0, 4);

                                    ?>
                                    <select class="form-select" id="exampleFormSelect1">
                                        <option value=<?php $year?>selected><?php echo $year;?></option>
                                        <?php
                                        $num = 1990;
                                        $strnum = strval($num);
                                        echo '<option value=',$strnum,'>',$strnum,'</option>';
                                        while($num != 2007){
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
                                <?php
                                    $month = substr($fetch_data['birthday'], 5, 2);

                                    ?>
                                    <select class="form-select" id="exampleFormSelect1">
                                        <option value=<?php $month?>selected><?php echo $month;?></option>
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
                                <div class="col-auto gx-2"><?php
                                    $day = substr($fetch_data['birthday'], 8, 2);

                                    ?>
                                    <select class="form-select" id="exampleFormSelect1">
                                        <option value=<?php $day?>selected><?php echo $day?></option>
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
                        <div class="col-5">
                            <span class="fs-4">卒業予定年</span>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-auto gx-2">
                                <?php
                                    
                                    $gyaer = substr($fetch_data['graduate_date'], 0, 4);

                                    ?>
                                    <select class="form-select" id="exampleFormSelect1">
                                        <option value=<?php $gyaer ?> selected><?php echo $gyaer ;?></option>
                                        <?php
                                        $gnum = 2025;
                                        $gstrnum = strval($gnum);
                                        echo '<option value=',$gstrnum,'>',$gstrnum,'</option>';
                                        while($gnum != 2028){
                                            $gnum++;
                                            $gstrnum = strval($gnum);
                                            echo '<option value=',$gstrnum,'>',$gstrnum,'</option>';
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
                        <div class="col-5">
                            <span class="fs-4">学校名</span>

                            
                        </div>
                        <div class="col-auto">
                        <?php
                                $sname = $fetch_data['school_name'];

                                $school = $pdo->prepare('SELECT school_id FROM schools WHERE school_name = :sname');
                                $school->execute([':sname' => $sname]);
                                
                             
                                $sid = $school->fetch(PDO::FETCH_ASSOC);
                                if ($sid !== false) {
                                    $sid = $sid['school_id']; 
                                
                                    $sql2 = $pdo->prepare('SELECT * FROM schools WHERE school_id <> :sid');
                                    $sql2->execute([':sid' => $sid]);
                                
                                    $res2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
                                } else {
                                   
                                    echo '学校が見つかりませんでした。';
                                }
                            ?>
                        
                            <select class="form-select" id="exampleFormSelect1">
                            <option value=<?php $sid ?>selected><?php echo htmlspecialchars($fetch_data['school_name']); ?>  </option>
                            <?php foreach($res2 as $row2): ?>
                                <option value="<?= $row2['school_id'] ?>"><?= $row2['school_name'] ?></option>
                                <?php endforeach; ?>
                          
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-5">
                            <span class="fs-4">学科</span>
                        </div>
                        <div class="col-auto">
                            <select class="form-select" id="exampleFormSelect1">
                                <option selected>情報システム専攻科</option>
                                <option value="1">その1</option>
                                <option value="2">その2</option>
                                <option value="3">その3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-5">
                            <span class="fs-4">就活状況</span>
                        </div>
                        <div class="col">
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="hut_job"
                                    value="option1">
                                <label for="hut_job" class="form-check-label">就職活動中</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="none_job"
                                    value="option2">
                                <label for="none_job" class="form-check-label">就職活動中ではない</label>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-5">
                            <span class="fs-4">内定有無</span>
                        </div>
                        <div class="col">
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="hold_scout"
                                    value="option1">
                                <label for="hold_scout" class="form-check-label">内定あり</label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input type="radio" class="form-check-input" name="inlineRadioOptions" id="none_scout"
                                    value="option2">
                                <label for="none_scout" class="form-check-label">内定なし</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4" style="margin-left: 66%;">
            <button type="button" onclick="location.href='./my_page_screen.php'" class="btn btn-success btn-lg">変更する</button>
            <button type="button" onclick="history.back();"
                class="btn btn-secondary btn-lg">キャンセル</button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>