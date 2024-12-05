<?php
include 'auth_check.php';
include 'db_connect.php';

$query = "SELECT * FROM Cars";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Showroom</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Car Showroom</h1>
    <a href="submit_car.php">Submit a Car</a> | <a href="logout.php">Logout</a>
    <div class="car-grid">
        <?php while ($car = $result->fetch_assoc()): ?>
            <div class="car">
                <img src="<?php echo htmlspecialchars($car['ImageURL']); ?>" alt="Car Image">
                <h2><?php echo htmlspecialchars($car['Brand'] . " " . $car['Model']); ?></h2>
                <p>Price: $<?php echo htmlspecialchars($car['Price']); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
