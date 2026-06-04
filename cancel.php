<?php
include 'connect.php';

$message = "";

if(isset($_POST['cancel'])){

    $id = $_POST['booking_id'];

    $sql = "DELETE FROM bookings
            WHERE booking_id='$id'";

    if(mysqli_query($conn,$sql)){
        $message = "✅ Ticket Cancelled Successfully";
    }
    else{
        $message = "❌ Cancellation Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cancel Ticket</title>
    <link rel="stylesheet" href="style.css?v=10">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<div class="hero">
    <h1>Cancel Ticket</h1>
    <p>Enter Booking ID to cancel your reservation</p>
</div>

<div class="container">

    <div class="card">

        <?php
        if($message != ""){
            echo "<h2>$message</h2><br>";
        }
        ?>

        <form method="POST">

            <input
                type="number"
                name="booking_id"
                placeholder="Enter Booking ID"
                required>

            <button type="submit" name="cancel">
                Cancel Ticket
            </button>

        </form>

    </div>

</div>

<footer>
    <p>Uniport Bus Ticket Booking System © 2026</p>
</footer>

</body>
</html>