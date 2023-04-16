<?php
include_once('../connection.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management System</title>
</head>

<body>
    <div class="flex flex-row">
        <?php include('../blocks/sidenavbar.php');?>
        <div class="flex-1">
            <p>Index</p>
        </div>
    </div>
</body>

</html>