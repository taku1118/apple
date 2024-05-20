<?php
if(isset($_POST['company-name'])){
    $sql=$pdo->prepare('select company_id from Companies where company_name like "%?%"');
    $sql->execute([$_POST['company-name']]);
}else if(isset($_GET['prefecture_id'])){
    $sql=$pdo->prepare('select company_id from Company_Prefecture where prefecture_id = ?');
    $sql->execute([$_GET['prefecture_id']]);
}else if(isset($_GET['job_id'])){
    $sql=$pdo->prepare('select company_id from Company_JobType where job_id = ?');
    $sql->execute([$_GET['job_id']]);
}else if(isset($_GET['industry_id'])){
    $sql=$pdo->prepare('select company_id from Company_Industry where industry_id = ?');
    $sql->execute([$_GET['industry_id']]);
}
foreach($sql as $row){
    $sql2=$pdo->prepare('select * from Companies where company_id = ?');
    $sql2->execute([$row['company_id']]);
    foreach($sql2 as $row2){
        echo '<div class="company">';
        echo '<figure class="conpany-logo">';
        echo '<img src="./IMAGES/',$row['logo_image'],'" class="rounded float-start" alt="...">';
        echo '</figure>';
        echo '<div class="company-name">';
        echo '<a href="companydetail.php?company_id="',$row2['company_id'],'>',$row2['company_name'],'</a>';
        echo '</div>';
    }
}
?>