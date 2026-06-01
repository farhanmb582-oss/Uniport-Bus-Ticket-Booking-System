<?php

include("connect.php");

if(isset($_POST['name'])){

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$seat = $_POST['seat'];

$sql1 = "INSERT INTO passengers(full_name,phone,email)
VALUES('$name','$phone','$email')";

$result1 = mysqli_query($conn,$sql1);

if($result1){

$passenger_id = mysqli_insert_id($conn);

$sql2 = "INSERT INTO bookings
(passenger_id,schedule_id,seat_number,total_fare,payment_status,booking_status)

VALUES

('$passenger_id',1,'$seat',750,'Paid','Booked')";

$result2 = mysqli_query($conn,$sql2);

}
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Booking Success</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">
    <h1>🔐 Login</h1>
    <p>Access your Uniport account</p>
</div>
<div class="container">

<?php

if(isset($result2) && $result2){

?>

<div class="card">

    <h1>✅ Ticket Booked Successfully</h1>

    <br>

    <p><strong>Passenger Name:</strong> <?php echo $name; ?></p>

    <p><strong>Phone:</strong> <?php echo $phone; ?></p>

    <p><strong>Email:</strong> <?php echo $email; ?></p>

    <p><strong>Seat Number:</strong> <?php echo $seat; ?></p>

    <p><strong>Fare:</strong> ৳750</p>

    <br>

    <a href="history.php" class="btn-book">
        View Booking History
    </a>

    <br><br>

    <a href="index.php" class="btn-book">
        Book Another Ticket
    </a>

</div>

<?php

}
else{

?>

<div class="card">

    <h1>❌ Booking Failed</h1>

    <p>Please try again.</p>

    <br>

    <a href="index.php" class="btn-book">
        Back To Home
    </a>

</div>

<?php

}

?>

</div>

<footer>
    <p>Uniport Bus Ticket Booking System © 2026</p>
</footer>

</body>
</html>