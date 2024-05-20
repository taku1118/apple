<?php
    const SERVER = 'mysql304.phy.lolipop.lan';
    const DBNAME = 'LAA1517449-apple';
    const USER = 'LAA1517449';
    const PASS = '4649';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
    $pdo=new PDO($connect,USER,PASS);
?>