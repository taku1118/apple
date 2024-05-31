<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
if (isset($_POST['company-name'])) {
    $company_name=$_POST['company-name'];
    if($company_name=''){
        $company_ids = $pdo->query('SELECT company_id FROM Companies');
    }else{
        $company_ids = $pdo->prepare('SELECT company_id FROM Companies WHERE company_name LIKE ? OR company_name-ruby LIKE ?');
        $company_ids->execute([$_POST['company-name'] . '%' , $_POST['company-name'] . '%']);
    }
} elseif (isset($_GET['prefecture_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_Prefecture WHERE prefecture_id = ?');
    $company_ids->execute([$_GET['prefecture_id']]);
} elseif (isset($_GET['job_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_JobType WHERE job_id = ?');
    $company_ids->execute([$_GET['job_id']]);
} elseif (isset($_GET['industry_id'])) {
    $company_ids = $pdo->prepare('SELECT company_id FROM Company_Industry WHERE industry_id = ?');
    $company_ids->execute([$_GET['industry_id']]);
}
?>
<?php
if (empty($company_ids)) {
    echo '該当する企業が見つかりませんでした。';
} else {
    foreach ($company_ids as $company_id) {
        $company_detail = $pdo->prepare('SELECT * FROM Companies WHERE company_id = ?');
        $company_detail->execute([$company_id]);
        foreach ($company_detail as $row) {
            echo '<div class="company">';
            echo '<figure class="company-logo">';
            if (empty($row['logo_image'])) {
                echo '<img src="../IMAGES/no_image.jpg" class="rounded float-start" alt="...">';
            } else {
                echo '<img src="../IMAGES/' . htmlspecialchars($row['logo_image'], ENT_QUOTES, 'UTF-8') . '" class="rounded float-start" alt="...">';
            }
            echo '</figure>';
            echo '<div class="company-name">';
            echo '<a href="companydetail.php?company_id=' . htmlspecialchars($row['company_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($row['company_name'], ENT_QUOTES, 'UTF-8') . '</a>';
            echo '</div>';
            echo '</div>';
        }
    }
}
?>
<?php require 'footer.php'; ?>