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

<body class="bg-gray-100">
    <div class="flex flex-row">
        <?php include('../blocks/sidenavbar.php'); ?>
        <div class="w-full p-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Reservation Management</h1>
            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="text-left py-2 px-3">Reservation ID</th>
                            <th class="text-left py-2 px-3">Guest ID</th>
                            <th class="text-left py-2 px-3">Guest Name</th>
                            <th class="text-left py-2 px-3">Room Type</th>
                            <th class="text-left py-2 px-3">Check-In Date</th>
                            <th class="text-left py-2 px-3">Check-Out Date</th>
                            <th class="text-left py-2 px-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $reservations_query = $pdo->query("SELECT reservations.reservation_id, reservations.guest_id, guests.guest_name, reservations.room_type, reservations.checkin_date, reservations.checkout_date FROM reservations INNER JOIN guests ON reservations.guest_id = guests.guest_id");
                        $reservations = $reservations_query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($reservations as $reservation) : ?>
                            <tr class="border-b">
                                <td class="py-3 px-4"><?php echo $reservation['reservation_id']; ?></td>
                                <td class="py-3 px-4"><?php echo $reservation['guest_id']; ?></td>
                                <td class="py-3 px-4"><?php echo $reservation['guest_name']; ?></td>
                                <td class="py-3 px-4"><?php echo $reservation['room_type']; ?></td>
                                <td class="py-3 px-4"><?php echo $reservation['checkin_date']; ?></td>
                                <td class="py-3 px-4"><?php echo $reservation['checkout_date']; ?></td>
                                <td class="py-3 px-4"><a href="edit_reservation.php?reservation_id=<?php echo $reservation['reservation_id']; ?>" class="text-blue-500 hover:underline">Edit</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>


</html>