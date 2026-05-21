<?php

session_start();

if(!isset($_SESSION['user'])){

header("Location: login.php");
exit();

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php include 'includes/navbar.php'; ?>

<div class="container">

<h1>User Dashboard</h1>

<p>Welcome To Uniport</p>

<br>

<a href="search.php">
<button>Search Bus</button>
</a>

<br><br>

<a href="history.php">
<button>Booking History</button>
</a>

<br><br>

<a href="logout.php">
<button>Logout</button>
</a>

</div>

</body>
</html>