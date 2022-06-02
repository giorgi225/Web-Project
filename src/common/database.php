<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=education-website', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM users');
$statement-> execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>