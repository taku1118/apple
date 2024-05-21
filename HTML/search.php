<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php
if (isset($_POST['company-name'])) {
    $sql = $pdo->prepare('SELECT company_id FROM Companies WHERE company_name LIKE ?');
    $sql->execute(['%' . $_POST['company-name'] . '%']);
} elseif (isset($_GET['prefecture_id'])) {
    $sql = $pdo->prepare('SELECT company_id FROM Company_Prefecture WHERE prefecture_id = ?');
    $sql->execute([$_GET['prefecture_id']]);
} elseif (isset($_GET['job_id'])) {
    $sql = $pdo->prepare('SELECT company_id FROM Company_JobType WHERE job_id = ?');
    $sql->execute([$_GET['job_id']]);
} elseif (isset($_GET['industry_id'])) {
    $sql = $pdo->prepare('SELECT company_id FROM Company_Industry WHERE industry_id = ?');
    $sql->execute([$_GET['industry_id']]);
}

$company_ids = $sql->fetchAll(PDO::FETCH_COLUMN);

if (empty($company_ids)) {
    echo '該当する企業が見つかりませんでした。';
} else {
    foreach ($company_ids as $company_id) {
        $sql2 = $pdo->prepare('SELECT * FROM Companies WHERE company_id = ?');
        $sql2->execute([$company_id]);
        $companies[] = $sql2->fetch(PDO::FETCH_ASSOC);
    }

    foreach ($companies as $company) {
        echo '<div class="company">';
        echo '<figure class="company-logo">';
        if (empty($company['logo_image'])) {
            echo '<img src="../IMAGES/no_image.jpg" class="rounded float-start" alt="...">';
        } else {
            echo '<img src="../IMAGES/' . htmlspecialchars($company['logo_image'], ENT_QUOTES, 'UTF-8') . '" class="rounded float-start" alt="...">';
        }
        echo '</figure>';
        echo '<div class="company-name">';
        echo '<a href="companydetail.php?company_id=' . htmlspecialchars($company['company_id'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($company['company_name'], ENT_QUOTES, 'UTF-8') . '</a>';
        echo '</div>';
        echo '</div>';
    }
}

?>
<?php require 'footer.php'; ?>