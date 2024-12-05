<?php
include 'auth_check.php';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $price = $_POST['price'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imagePath = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

        $query = "INSERT INTO Cars (Brand, Model, Price, ImageURL, SubmittedBy) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssdsi", $brand, $model, $price, $imagePath, $_SESSION['user_id']);

        if ($stmt->execute()) {
            echo "<script>alert('Car submitted successfully!');</script>";
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Car</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h1>Submit a Car</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="brand" placeholder="Car Brand" required>
            <input type="text" name="model" placeholder="Car Model" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
