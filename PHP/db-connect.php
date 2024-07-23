<?php
const SERVER = 'mysql304.phy.lolipop.lan';
const DBNAME = 'LAA1517441-apple';
const USER = 'LAA1517441';
const PASS = 'FPRAv8sgZrws8rT';
// const SERVER = 'localhost';
// const DBNAME = 'applechaps';
// const USER = 'root';
// const PASS = 'root';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('データベース接続失敗: ' . $e->getMessage());
}
?>