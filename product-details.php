<?php
session_start();
include ("Backend/koneksi/koneksi.php");

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    die("User not logged in");
}

// Assuming user is logged in and user_id is stored in session
$user_id = $_SESSION['id'];

// Get the product ID from the URL
$product_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch product details from the database
$product_sql = "SELECT * FROM products WHERE id_product = ?";
$product_stmt = $conn->prepare($product_sql);
$product_stmt->bind_param("i", $product_id);
$product_stmt->execute();
$product_result = $product_stmt->get_result();
$product = $product_result->fetch_assoc();

// Fetch 4 related products from the database
$related_sql = "SELECT * FROM products LIMIT 4";
$related_result = $conn->query($related_sql);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nix.ID | Ecommerce website</title>
    <link rel="stylesheet" href="./style.css">
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
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo $product['image_product']; ?>.jpg" width="100%" id="productImg">
            </div>
            <div class="col-2">
                <p>Home / Shoes</p>
                <h1><?php echo $product['nama_product']; ?></h1>
                <h4>Rp.<?php echo number_format($product['harga_product'], 0, ',', '.'); ?></h4>
                <form method="POST" action="add_to_cart.php">
                    <select name="size">
                        <option>Select Size</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                    </select>
                    <input type="number" name="quantity" value="1" min="1">
                    <input type="hidden" name="product_id" value="<?php echo $product['id_product']; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <button type="submit" class="btn">Add to Cart</button>
                </form>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo $product['description']; ?></p>
            </div>
        </div>
    </div>


    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <a href="product.php">
                <p>View More</p>
            </a>
        </div>
    </div>

    <div class="small-container">
        <div class="row">
            <?php
            if ($related_result->num_rows > 0) {
                while ($row = $related_result->fetch_assoc()) {
                    echo '<div class="col-4">';
                    echo '<a href="product-details.php?id=' . $row["id_product"] . '"><img src="' . $row["image_product"] . '.jpg"></a>';
                    echo '<a href="product-details.php?id=' . $row["id_product"] . '"><h4>' . $row["nama_product"] . '</h4></a>';
                    echo '<div class="rating">';
                    echo '<i class="fa fa-star"></i>';
                    echo '<i class="fa fa-star"></i>';
                    echo '<i class="fa fa-star"></i>';
                    echo '<i class="fa fa-star-half-o"></i>';
                    echo '<i class="fa fa-star-o"></i>';
                    echo '</div>';
                    echo '<p>Rp.' . number_format($row["harga_product"], 0, ',', '.') . '</p>';
                    echo '</div>';
                }
            } else {
                echo "No products available.";
            }
            ?>
        </div>
    </div>
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

<?php
$product_stmt->close();

?>