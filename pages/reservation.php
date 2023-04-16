<?php
include_once('../connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $guest_name = $_POST['guest_name'];
    $guest_email = $_POST['guest_email'];
    $room_type = $_POST['room_type'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];

    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=localhost;dbname=hotel_ter_tuin", $username, $password);

        // get guest_id from guests table
        $stmt = $conn->prepare("SELECT guest_id FROM guests WHERE guest_name = :guest_name AND guest_email = :guest_email");
        $stmt->bindParam(':guest_name', $guest_name);
        $stmt->bindParam(':guest_email', $guest_email);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            // insert reservation with guest_id foreign key
            $guest_id = $result['guest_id'];
            $stmt = $conn->prepare("INSERT INTO reservations (guest_id, room_type, checkin_date, checkout_date) VALUES (:guest_id, :room_type, :checkin_date, :checkout_date)");
            $stmt->bindParam(':guest_id', $guest_id);
            $stmt->bindParam(':room_type', $room_type);
            $stmt->bindParam(':checkin_date', $checkin_date);
            $stmt->bindParam(':checkout_date', $checkout_date);

            if ($stmt->execute()) {
                echo "Thank you for your reservation, $guest_name! We have reserved a $room_type room for you from $checkin_date to $checkout_date.";
            }
        } else {
            // insert guest and reservation with guest_id foreign key
            $stmt = $conn->prepare("INSERT INTO guests (guest_name, guest_email) VALUES (:guest_name, :guest_email)");
            $stmt->bindParam(':guest_name', $guest_name);
            $stmt->bindParam(':guest_email', $guest_email);
            $stmt->execute();
            $guest_id = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO reservations (guest_id, room_type, checkin_date, checkout_date) VALUES (:guest_id, :room_type, :checkin_date, :checkout_date)");
            $stmt->bindParam(':guest_id', $guest_id);
            $stmt->bindParam(':room_type', $room_type);
            $stmt->bindParam(':checkin_date', $checkin_date);
            $stmt->bindParam(':checkout_date', $checkout_date);

            if ($stmt->execute()) {
                echo "Thank you for your reservation, $guest_name! We have reserved a $room_type room for you from $checkin_date to $checkout_date.";
            }
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Page</title>
</head>

<body>
    <!-- Navbar -->
    <nav class=" border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <span class="text-xl font-semibold dark:text-white">Hotel ter tuin</span>
            <div class="hidden w-full md:block md:w-auto">
                <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="reservation.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Kamers</a>
                    </li>
                    <li>
                        <a href="services.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Services</a>
                    </li>
                    <li>
                        <a href="contact.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Contact</a>
                    </li>
                    <li>
                        <a href="../admin/login.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="container mx-auto px-4 ">
        <!-- Rooms -->
        <div class="flex justify-center pb-10">
            <div class="flex-row md:flex bg-gray-300">
                <div class="flex flex-col items-center">
                    <img src="https://picsum.photos/seed/65/500/300">
                    <a class="">Single Room</a>
                    <a>Missed lovers way one vanity wishes nay but. Use shy seemed within twenty wished old few regret passed. Absolute one hastened mrs any sensible</a>
                    <a href="room-details.php">Check Details</a>
                </div>
                <div class="flex flex-col items-center">
                    <img src="https://picsum.photos/seed/54/500/300">
                    <a class="">Double Room</a>
                    <a>Missed lovers way one vanity wishes nay but. Use shy seemed within twenty wished old few regret passed. Absolute one hastened mrs any sensible</a>
                    <a href="room-details.php">Check Details</a>
                </div>
                <div class="flex flex-col items-center">
                    <img src="https://picsum.photos/seed/36/500/300">
                    <a class="">Suite</a>
                    <a>Missed lovers way one vanity wishes nay but. Use shy seemed within twenty wished old few regret passed. Absolute one hastened mrs any sensible</a>
                    <a href="room-details.php">Check Details</a>
                </div>
            </div>
        </div>
        <!-- Rooms -->
        <form class="grid gap-4 grid-cols-1" method="post" action="reservation.php">
            <div class="">
                <label for="guest_name">Guest Name:</label>
                <input type="text" id="guest_name" name="guest_name" required>
            </div>

            <div class="">
                <label for="guest_email">Guest Email:</label>
                <input type="email" id="guest_email" name="guest_email" required>
            </div>

            <div class="">
                <label for="room_type">Room Type:</label>
                <select id="room_type" name="room_type">
                    <option value="Single">Single Room</option>
                    <option value="Double">Double Room</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>

            <div class="">
                <label for="checkin_date">Check-in Date:</label>
                <input type="date" id="checkin_date" name="checkin_date" required>
            </div>

            <div class="">
                <label for="checkout_date">Check-out Date:</label>
                <input type="date" id="checkout_date" name="checkout_date" required>
            </div>
            <div class="border-2 rounded-full border-black text-red-500 text-center">
                <button type="submit" value="Submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>