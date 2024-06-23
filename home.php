<?php
include ("Backend/koneksi/koneksi.php");

// Fetch data from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
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
    <!--added a cdn link by searching font awesome4 cdn and getting this link from https://www.bootstrapcdn.com/fontawesome/ this url*/-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- hero section -->
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
            <div class="row">
                <div class="col-2">
                    <h1>Bingung Cari style kekinian? <br>NIX-ID kasisolusi!</h1>
                    <p>Success isn't always about greatness. It's about consistency. Consistent<br>hard work gains
                        success. Greatness will come.</p>
                    <a href="/Nix-ID/product.html" class="btn">Explore Now &#8594;</a>
                </div>
                <div class="col-2">
                    <img
                        src="https://images.unsplash.com/photo-1518002171953-a080ee817e1f?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
            </div>
        </div>
    </div>


    <!-- Catagory -->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <img
                        src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?q=80&w=2798&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                <div class="col-3">
                    <img
                        src="https://images.unsplash.com/photo-1559067515-bf7d799b6d4d?q=80&w=2787&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
                <div class="col-3">
                    <img
                        src="https://images.unsplash.com/photo-1574946943172-4800feadfab7?q=80&w=2864&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                </div>
            </div>
        </div>
    </div>

    <div class="small-container">
        <h2 class="title">Paling Laris !!!!</h2>
        <div class="row">
            <div class="col-4">
                <a href="product.html"><img src="./images/1.jpg"></a>
                <a href="products-details.html">
                    <h4>Downshifter Sports Shoes</h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>Rp.240.000</p>
            </div>
            <div class="col-4">
                <a href="product.php"><img src="images/2.jpg" g"></a>
                <h4>Lace-Up Running Shoes</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>Rp.310.000</p>
            </div>
            <div class="col-4">
                <a href="product.php"><img src="images/3.jpg""></a>
                    <h4>Lace Fastening Shoes</h4>
                    <div class=" rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
            </div>
            <p>Rp.199.000</p>
        </div>
        <div class="col-4">
            <a href="product.php"><img src="images/4.jpg"></a>
            <h4>Flat Lace-Fastening Shoes</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>Rp.399.000</p>
        </div>
    </div>
    <h2 class="title">Produk Ready Stock</h2>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-4">';
                echo '<a href="product.php?id=' . $row["id_product"] . '"><img src="' . $row["image_product"] . '.jpg"></a>';
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
        } else {
            echo "No products available.";
        }
        $conn->close();
        ?>
    </div>
    </div>

    <!-- Offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Hanya tersedia di Toko Kami</p>
                    <h1>Semua jenis sepatu keren</h1>
                    <small> Dapatkan koleksi sepatu terbaru kami dengan diskon spesial! Tersedia berbagai pilihan gaya
                        dan warna yang pastinya akan menambah kepercayaan diri Anda </small><br>
                    <a href="./product.html" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Sepatu dari brand ini sangat nyaman dan stylish, cocok untuk berbagai aktivitas sehari-hari.
                        Kualitasnya luar biasa dan harganya sangat terjangkau</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h3>Nasrun Hidayat </h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Sepatu ini benar-benar menggabungkan kenyamanan dan gaya yang tak tertandingi. Saya selalu
                        mendapatkan pujian setiap kali memakainya!</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>

                    <h3>Smith van sartoji</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Sejak pertama kali mencoba, saya langsung jatuh cinta dengan kenyamanan dan desain sepatu ini.
                        Kualitasnya sangat baik dan tahan lama, cocok untuk segala situasi </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>

                    <h3>Dewangga anggara</h3>
                </div>
            </div>
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
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            }
            else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>

</html>