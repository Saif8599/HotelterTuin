<?php
include_once('../connection.php');

function uidExists($conn, $username, $password)
{
    $query = "SELECT * FROM medewerkers WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->execute(
        array(
            'username' => $username,
            'password' => $password
        )
    );
    $count = $stmt->rowCount();
    if ($count) {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        header("location: index.php");
        exit;
    }
}

function LoggedInUser($conn, $username, $password)
{
    $query = "SELECT * FROM medewerkers WHERE username = :username AND password = :password";

    $stmt = $conn->prepare($query);
    $stmt->execute(
        array(
            'username' => $username,
            'password' => $password
        )
    );

    $uidExists = uidExists($conn, $username, $password);
    $checkPwd = password_verify($password, $_POST['password']);
    if ($checkPwd === false) {
        echo "<h class='updatetext'>Invalid username password combination</h>";
        exit();
    } else if ($checkPwd === true) {
        $_SESSION['username'] = $uidExists['username'];
        $_SESSION['password'] = $uidExists['password'];
        echo "Logged in";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <div class="">
        <?php include('../blocks/navbar.php'); ?>
        <div class="items-center mt-24 mx-auto pt-14 px-80 bg-gray-200">
            <form class="" action="login.php" method="POST">
                <h1 class="text-3xl pb-10">Hotel ter Tuin Admin Panel</h1>
                <div class=""><input type="text" name="username" placeholder="Username"></div><br>
                <div class=""><input type="password" name="password" placeholder="Password"></div><br>
                <div class="pb-10"><input type="submit" name="submit" placeholder="Login"></div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                //username & password required

                if (empty($_POST["username"])) {
                    echo "<h1 class='text-red-500'>Username is required</h1>";
                    exit;
                } elseif (empty($_POST["password"])) {
                    echo "<h1 class='text-red-500'>Password is required</h1>";
                    exit;
                }

                LoggedInUser($pdo, $username, $password);
            }
            ?>
        </div>
    </div>
</body>

</html>