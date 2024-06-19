<?php
// 環境変数からデータベース接続情報を取得
//const SERVER = getenv('DB_SERVER') ?: 'mysql304.phy.lolipop.lan';
//const DBNAME = getenv('DB_NAME') ?: 'LAA1517449-apple';
//const USER = getenv('DB_USER') ?: 'LAA1517449';
//const PASS = getenv('DB_PASS') ?: '4649';
const SERVER = 'localhost';
const DBNAME = 'applechaps';
const USER = 'root';
const PASS = 'root';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die('データベース接続失敗: ' . $e->getMessage());
}
?>