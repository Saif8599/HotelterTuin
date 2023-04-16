<?php
include 'db.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $reservation_id = trim($_POST['reservation_id']);
    $guest_name = trim($_POST['guest_name']);
    $guest_email = trim($_POST['guest_email']);
    $room_type = trim($_POST['room_type']);
    $checkin_date = trim($_POST['checkin_date']);
    $checkout_date = trim($_POST['checkout_date']);
}
try {
    $username = "root";
    $password = "";
    $conn = new PDO("mysql:host=localhost;dbname=huis_der_tuin", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // check if the request is for updating a reservation or creating a new one
    if (!empty($reservation_id)) {
        // update existing reservation
        $sql = "UPDATE reservations SET guest_name=:guest_name, guest_email=:guest_email, room_type=:room_type, checkin_date=:checkin_date, checkout_date=:checkout_date WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $reservation_id);
        $stmt->bindParam(':guest_name', $guest_name);
        $stmt->bindParam(':guest_email', $guest_email);
        $stmt->bindParam(':room_type', $room_type);
        $stmt->bindParam(':checkin_date', $checkin_date);
        $stmt->bindParam(':checkout_date', $checkout_date);
    } else {
        // insert new reservation
        $sql = "INSERT INTO reservations (guest_name, guest_email, room_type, checkin_date, checkout_date)
        VALUES (:guest_name, :guest_email, :room_type, :checkin_date, :checkout_date)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':guest_name', $guest_name);
        $stmt->bindParam(':guest_email', $guest_email);
        $stmt->bindParam(':room_type', $room_type);
        $stmt->bindParam(':checkin_date', $checkin_date);
        $stmt->bindParam(':checkout_date', $checkout_date);
    }

    if ($stmt->execute()) {
        echo "Reservation updated/created successfully";
    } else {
        echo "An error occurred: " . $sql . "<br>" . $conn->error;
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List</title>
</head>

<body>
    <h1>Reservation List</h1>
    <table>
        <thead>
            <tr>
                <th>Guest Name</th>
                <th>Guest Email</th>
                <th>Room Type</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // fetch reservation data from database and display in table
            $reservations = $db->getReservations();
            foreach ($reservations as $reservation) {
                echo "<tr>";
                echo "<td>" . $reservation['guest_name'] . "</td>";
                echo "<td>" . $reservation['guest_email'] . "</td>";
                echo "<td>" . $reservation['room_type'] . "</td>";
                echo "<td>" . $reservation['checkin_date'] . "</td>";
                echo "<td>" . $reservation['checkout_date'] . "</td>";
                echo "<td><a href='edit_reservation.php?id=" . $reservation['id'] . "'>Edit</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>