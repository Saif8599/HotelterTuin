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

<body class="bg-gray-100">
    <?php include('../blocks/navbar.php'); ?>
    <div class="container mx-auto px-4 pt-10">
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                <!-- Single Room Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <img src="https://picsum.photos/seed/65/500/300" class="mb-4 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800">Single Room</h2>
                    <p class="text-gray-600 mt-2">Experience a cozy and comfortable stay in our single rooms. Perfect for solo travelers.</p>
                    <a href="room-details.php" class="text-blue-500 hover:underline mt-4 block">Check Details</a>
                </div>

                <!-- Double Room Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <img src="https://picsum.photos/seed/54/500/300" class="mb-4 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800">Double Room</h2>
                    <p class="text-gray-600 mt-2">Our double rooms provide extra space and comfort for a relaxing stay.</p>
                    <a href="room-details.php" class="text-blue-500 hover:underline mt-4 block">Check Details</a>
                </div>

                <!-- Suite Room Card -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <img src="https://picsum.photos/seed/36/500/300" class="mb-4 rounded-lg">
                    <h2 class="text-xl font-semibold text-gray-800">Suite</h2>
                    <p class="text-gray-600 mt-2">Indulge in luxury with our spacious and well-appointed suites.</p>
                    <a href="room-details.php" class="text-blue-500 hover:underline mt-4 block">Check Details</a>
                </div>
            </div>
        </div>
        <form class="mt-10 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md" method="post" action="reservation.php">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Make a Reservation</h1>
            <div class="mb-4">
                <label for="guest_name" class="text-gray-800">Guest Name</label>
                <input type="text" id="guest_name" name="guest_name" required class="w-full px-4 py-2 border rounded focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="guest_email" class="text-gray-800">Guest Email</label>
                <input type="email" id="guest_email" name="guest_email" required class="w-full px-4 py-2 border rounded focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="room_type" class="text-gray-800">Room Type</label>
                <select id="room_type" name="room_type" class="w-full px-4 py-2 border rounded focus:ring focus:border-blue-300">
                    <option value="Single">Single Room</option>
                    <option value="Double">Double Room</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="checkin_date" class="text-gray-800">Check-in Date</label>
                <input type="date" id="checkin_date" name="checkin_date" required class="w-full px-4 py-2 border rounded focus:ring focus:border-blue-300">
            </div>

            <div class="mb-4">
                <label for="checkout_date" class="text-gray-800">Check-out Date</label>
                <input type="date" id="checkout_date" name="checkout_date" required class="w-full px-4 py-2 border rounded focus:ring focus:border-blue-300">
            </div>

            <div class="mb-6">
                <button type="submit" value="Submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300 ease-in-out">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>




</html>