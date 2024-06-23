<?php
session_start();
include("Backend/koneksi/koneksi.php");

// Get form data
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : 0;
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

// Ensure user ID exists in the session
if ($user_id == 0) {
    die("Invalid user ID");
}

// Insert into cart table
$sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $user_id, $product_id, $quantity);

if ($stmt->execute()) {
    echo "Product added to cart successfully!";
    // Redirect to cart page or show a success message
    header("Location: cart.php"); // Redirect to a cart page (create this page as needed)
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
