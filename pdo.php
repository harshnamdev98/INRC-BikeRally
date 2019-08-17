<?php
 date_default_timezone_set("Asia/Kolkata");

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=inrc', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
