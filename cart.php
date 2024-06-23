<?php
session_start();
include ("Backend/koneksi/koneksi.php");

// Assuming user is logged in and user_id is stored in session
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

// Fetch cart items and associated product details
$cart_sql = "SELECT c.cart_id, c.quantity, p.id_product, p.nama_product, p.harga_product, p.image_product 
             FROM cart c
             JOIN products p ON c.product_id = p.id_product
             WHERE c.user_id = ?";
$cart_stmt = $conn->prepare($cart_sql);
$cart_stmt->bind_param("i", $user_id);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();

$cart_items = [];
$total = 0;

while ($row = $cart_result->fetch_assoc()) {
    $subtotal = $row['quantity'] * $row['harga_product'];
    $total += $subtotal;
    $row['subtotal'] = $subtotal;
    $cart_items[] = $row;
}

$cart_stmt->close();

// Handle form submission for checkout
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Insert order into orders table
    $order_sql = "INSERT INTO orders (user_id, total_amount) VALUES (?, ?)";
    $order_stmt = $conn->prepare($order_sql);
    $order_stmt->bind_param("id", $user_id, $total);
    $order_stmt->execute();
    $order_id = $order_stmt->insert_id;
    $order_stmt->close();

    // Insert order items into order_items table
    foreach ($cart_items as $item) {
        $order_item_sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $order_item_stmt = $conn->prepare($order_item_sql);
        $order_item_stmt->bind_param("iiid", $order_id, $item['id_product'], $item['quantity'], $item['harga_product']);
        $order_item_stmt->execute();
        $order_item_stmt->close();
    }

    // Clear the cart
    $clear_cart_sql = "DELETE FROM cart WHERE user_id = ?";
    $clear_cart_stmt = $conn->prepare($clear_cart_sql);
    $clear_cart_stmt->bind_param("i", $user_id);
    $clear_cart_stmt->execute();
    $clear_cart_stmt->close();

    // Redirect to a confirmation page or display a success message
    header("Location: confirmation.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Nix.ID</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a style="font-weight: 700;" href="index.html">NIX.ID</a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="login.php">Account</a></li>

                    </ul>
                </nav>
                <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onClick="menutoggle()">
            </div>
        </div>
    </div>

    <!------------------------------ cart items details------------------------------>
    <div class="small-container cart-page">
        <form method="POST" action="">
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php if (!empty($cart_items)): ?>
                    <?php foreach ($cart_items as $item): ?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="<?php echo $item['image_product']; ?>.jpg">
                                    <div>
                                        <p><?php echo $item['nama_product']; ?></p>
                                        <small>Harga:
                                            Rp.<?php echo number_format($item['harga_product'], 0, ',', '.'); ?></small><br>
                                        <a href="remove_from_cart.php?cart_id=<?php echo $item['cart_id']; ?>">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" value="<?php echo $item['quantity']; ?>" min="1"></td>
                            <td>Rp.<?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Your cart is empty.</td>
                    </tr>
                <?php endif; ?>
            </table>

            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>Rp.<?php echo number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>Rp.<?php echo number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>
                            <select name="payment_method" required>
                                <option value="bank_transfer">Bank Transfer</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn">Bayar</button></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

    <!----------------------------------footer------------------------------------->
    <footer class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex justify-center font-bold text-black-600 sm:justify-start">
                    <h2>NIX-ID</h2>
                </div>
                <p class="mt-4 text-center text-sm text-gray-500 lg:mt-0 lg:text-right">
                    Copyright &copy; 2022. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-----------------------------------js for toggle menu-------------------------------------->
    <script>
        var menuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight === "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

</body>

</html>