<?php
include_once('../connection.php');
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
}

// Fetch the reservation data for the specific reservation
$reservation_id = $_GET['reservation_id'];
$reservation_query = $pdo->prepare("SELECT reservations.reservation_id, reservations.guest_id, guests.guest_name, guests.guest_email, reservations.room_type, reservations.checkin_date, reservations.checkout_date FROM reservations INNER JOIN guests ON reservations.guest_id = guests.guest_id WHERE reservations.reservation_id = :reservation_id");
$reservation_query->execute(['reservation_id' => $reservation_id]);
$reservation_data = $reservation_query->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    // Update reservation in database
    $guest_id = $reservation_data['guest_id'];
    $guest_name = $_POST['guest_name'];
    $room_type = $_POST['room_type'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];

    $update_guest_query = $pdo->prepare("UPDATE guests SET guest_name = :guest_name WHERE guest_id = :guest_id");
    $update_guest_query->execute(['guest_name' => $guest_name, 'guest_id' => $guest_id]);

    $update_reservation_query = $pdo->prepare("UPDATE reservations SET room_type = :room_type, checkin_date = :checkin_date, checkout_date = :checkout_date WHERE reservation_id = :reservation_id");
    $update_reservation_query->execute(['room_type' => $room_type, 'checkin_date' => $checkin_date, 'checkout_date' => $checkout_date, 'reservation_id' => $reservation_id]);

    // Fetch the updated reservation data from the database
    $reservation_query = $pdo->prepare("SELECT reservations.reservation_id, reservations.guest_id, guests.guest_name, guests.guest_email, reservations.room_type, reservations.checkin_date, reservations.checkout_date FROM reservations INNER JOIN guests ON reservations.guest_id = guests.guest_id WHERE reservations.reservation_id = :reservation_id");
    $reservation_query->execute(['reservation_id' => $reservation_id]);
    $reservation_data = $reservation_query->fetch(PDO::FETCH_ASSOC);

    // Display a success message
    $success_message = "Reservation updated successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
</head>

<body class="bg-gray-200">
    <div class="flex flex-row">
        <?php include('../blocks/sidenavbar.php'); ?>
        <div class="p-6 w-full">
            <h1 class="text-2xl font-bold mb-4">Edit Reservation <?php echo $reservation_data['reservation_id']; ?></h1>
            <form action="edit_reservation.php?reservation_id=<?php echo $reservation_id; ?>" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label for="guest_id" class="text-gray-700 font-bold mb-2">Guest ID:</label>
                    <input type="text" name="guest_id" id="guest_id" value="<?php echo $reservation_data['guest_id']; ?>" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" disabled>
                </div>
                <div class="mb-4">
                    <label for="guest_name" class=" text-gray-700 font-bold mb-2">Guest Name:</label>
                    <input type="text" name="guest_name" id="guest_name" value="<?php echo $reservation_data['guest_name']; ?>" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                <div class="mb-4">
                    <label for="room_type" class=" text-gray-700 font-bold mb-2">Room Type:</label>
                    <select id="room_type" name="room_type" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                        <option value="<?php echo $reservation_data['room_type']; ?>"><?php echo $reservation_data['room_type']; ?></option>
                        <option value="Single">Single Room</option>
                        <option value="Double">Double Room</option>
                        <option value="Suite">Suite</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="checkin_date" class=" text-gray-700 font-bold mb-2">Check-In Date:</label>
                    <input type="date" name="checkin_date" id="checkin_date" value="<?php echo $reservation_data['checkin_date']; ?>" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                <div class="mb-4">
                    <label for="checkout_date" class=" text-gray-700 font-bold mb-2">Check-Out Date:</label>
                    <input type="date" name="checkout_date" id="checkout_date" value="<?php echo $reservation_data['checkout_date']; ?>" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" name="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Reservation</button>
                </div>
            </form>
            <?php if (isset($success_message)) { ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold"><?php echo $success_message; ?></strong>
                </div>
            <?php } ?>
        </div>
    </div>
</body>


</html>