```php
<?php
include("connect.php");

if(!isset($_POST['name'])){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Ticket</title>
    <link rel="stylesheet" href="style.css?v=20">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">
    <h1>🚌 Book Your Ticket</h1>
    <p>Fill in the details below to reserve your seat.</p>
</div>

<div class="container">
    <div class="card">

        <form action="booking.php" method="POST">

            <input type="text" name="name" placeholder="Full Name" required>

            <input type="text" name="phone" placeholder="Phone Number" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="text" name="seat" placeholder="Seat Number (A1, A2, B1)" required>

            <button type="submit">
                Book Ticket
            </button>

        </form>

    </div>
</div>

<footer>
    <p>Uniport Bus Ticket Booking System © 2026</p>
</footer>

</body>
</html>

<?php
exit();
}

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

}else{

    $result2 = false;

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Status</title>
    <link rel="stylesheet" href="style.css?v=20">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">
    <h1>🎫 Booking Status</h1>
</div>

<div class="container">

<?php if(isset($result2) && $result2){ ?>

<div class="card">

    <h1>✅ Ticket Booked Successfully</h1>

    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Seat:</strong> <?php echo $seat; ?></p>
    <p><strong>Fare:</strong> ৳750</p>

    <br>

    <a href="history.php" class="btn-book">
        View Booking History
    </a>

</div>

<?php } else { ?>

<div class="card">

    <h1>❌ Booking Failed</h1>

    <p>
        Phone number may already exist or seat may already be booked.
    </p>

    <br>

    <a href="booking.php" class="btn-book">
        Try Again
    </a>

</div>

<?php } ?>

</div>

<footer>
    <p>Uniport Bus Ticket Booking System © 2026</p>
</footer>

</body>
</html>
```
