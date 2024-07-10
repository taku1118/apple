<?php
session_start();
require 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_SESSION['user']['student_number']; 

    // Delete existing skills for the student
    $delete_sql = $pdo->prepare("DELETE FROM Skill_Manage WHERE student_number = ?");
    $delete_sql->execute([$student_number]);

    if (isset($_POST['skills']) && is_array($_POST['skills'])) {
        $skills = $_POST['skills'];

        // Insert new skills
        $insert_sql = $pdo->prepare("INSERT INTO Skill_Manage (student_number, skill_name) VALUES (?, ?)");
        foreach ($skills as $skill) {
            if (!empty($skill)) {
                $insert_sql->execute([$student_number, $skill]);
            }
        }
    }

    header("Location: my_page_screen.php");
    exit;
} else {
    echo "Invalid request method.";
}

$pdo = null;
?>