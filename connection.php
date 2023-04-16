<?php
$host = '127.0.0.1';
$db   = 'hotel_ter_tuin';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$conn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
	$pdo = new PDO($conn, $user, $pass, $options);
} catch (\PDOException $e) {
	echo "Connection failed! Check connection file";
};
?>
<script src="https://cdn.tailwindcss.com"></script>
