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
        echo "<h class='text-red-500 font-semibold mt-4'>Invalid username password combination</h>";
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
        <div class="flex items-center justify-center min-h-screen bg-gray-200">
            <form class="bg-white p-8 rounded-lg shadow-md w-96" action="login.php" method="POST">
                <h1 class="text-3xl text-center text-gray-800 mb-6">Hotel ter Tuin Admin Panel</h1>

                <div class="mb-4">
                    <input type="text" name="username" placeholder="Username" class="w-full px-4 py-2 border rounded focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border rounded focus:ring focus:border-blue-300">
                </div>

                <div class="mb-6">
                    <button type="submit" name="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300 ease-in-out">
                        Login
                    </button>
                </div>


                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Check if either the username or password is empty
                    if (empty($username) || empty($password)) {
                        echo "<h1 class='text-red-500 font-semibold mt-4'>Username and password are both required</h1>                        ";
                    } else {
                        // Perform the login logic here
                        LoggedInUser($pdo, $username, $password);
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>


</html>