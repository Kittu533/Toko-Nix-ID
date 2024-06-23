<?php
include ("Backend/koneksi/koneksi.php");

// Get sorting option from the form
$sortOption = isset($_POST['sortOption']) ? $_POST['sortOption'] : 'default';

// Determine the SQL order clause based on the selected sorting option
switch ($sortOption) {
    case 'price':
        $orderBy = "ORDER BY harga_product ASC";
        break;
    default:
        $orderBy = "";
        break;
}

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
    <div class="small-container">
        <div class="row row-2">
            <h2>All Products</h2>
            <form method="POST" action="">
                <select name="sortOption" onchange="this.form.submit()">
                    <option value="default" <?php echo ($sortOption == 'default') ? 'selected' : ''; ?>>Default sorting
                    </option>
                    <option value="price" <?php echo ($sortOption == 'price') ? 'selected' : ''; ?>>Sort by price</option>
                </select>
            </form>
        </div>

        <div class="row">
            <?php
            // Fetch data from the database with sorting
            $sql = "SELECT * FROM products $orderBy";
            $result = $conn->query($sql);

            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-4">';
                echo '<a href="product-details.php?id=' . $row["id_product"] . '"><img src="' . $row["image_product"] . '.jpg"></a>';
                echo '<h4>' . $row["nama_product"] . '</h4>';
                echo '<div class="rating">';
                echo '<i class="fa fa-star" ></i>';
                echo '<i class="fa fa-star" ></i>';
                echo '<i class="fa fa-star" ></i>';
                echo '<i class="fa fa-star-half-o" ></i>';
                echo '<i class="fa fa-star-o" ></i>';
                echo '</div>';
                echo '<p>Rp.' . number_format($row["harga_product"], 0, ',', '.') . '</p>';
                echo '</div>';
            }
            ?>
        </div>

        <div class="page-btn">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>&#8594;</span>
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
</body>

</html>

<?php
$conn->close();
?>