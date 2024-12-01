<?php
$conn = null; 
$dsn = 'mysql:host=localhost;dbname=product_management';
$username = 'root';
$password = '';
try {
    $conn = new PDO($dsn, $username, $password);
} catch (\Throwable $th) {
    echo $th->getMessage();
    exit();
}
