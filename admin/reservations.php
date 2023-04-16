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
        <?php include('../blocks/sidenavbar.php'); ?>
        <div class="border">
            <table>
                <thead>
                    <tr class="text-red-500">
                        <th>Reservation ID</th>
                        <th>Guest ID</th>
                        <th>Guest Name</th>
                        <th>Room Type</th>
                        <th>Check-In Date</th>
                        <th>Check-Out Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $reservations_query = $pdo->query("SELECT reservations.reservation_id, reservations.guest_id, guests.guest_name, reservations.room_type, reservations.checkin_date, reservations.checkout_date FROM reservations INNER JOIN guests ON reservations.guest_id = guests.guest_id");
                    $reservations = $reservations_query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($reservations as $reservation) : ?>
                        <tr class="border">
                            <td><?php echo $reservation['reservation_id']; ?></td>
                            <td><?php echo $reservation['guest_id']; ?></td>
                            <td><?php echo $reservation['guest_name']; ?></td>
                            <td><?php echo $reservation['room_type']; ?></td>
                            <td><?php echo $reservation['checkin_date']; ?></td>
                            <td><?php echo $reservation['checkout_date']; ?></td>
                            <td><a href="edit_reservation.php?reservation_id=<?php echo $reservation['reservation_id']; ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>