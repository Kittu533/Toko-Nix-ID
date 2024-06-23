<?php
include ("Backend/koneksi/koneksi.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form data is set
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Ambil nilai dari form
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Query untuk menyimpan data ke tabel 'users'
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        // Check if database connection is successful
        if ($conn) {
            // Jalankan query
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>alert('Registrasi berhasil!');</script>";
            } else {
                echo "<script>alert('Registrasi gagal!');</script>";
            }
        } else {
            echo "<script>alert('Koneksi ke database gagal!');</script>";
        }
    } else {
        echo "<script>alert('Form data tidak lengkap!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Register - NIX.ID</title>
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
                    <a style="font-weight: 700;" href="home.php">NIX.ID</a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="/Nix-ID/product.html">Products</a></li>
                        <li><a href="index.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onClick="menutoggle()">
            </div>
        </div>
    </div>
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <form id="RegForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <label for="">REGISTER</label>
                            <input type="text" name="username" placeholder="username">
                            <!-- Tambahkan name="username" -->
                            <input type="email" name="email" placeholder="email"> <!-- Tambahkan name="email" -->
                            <input type="password" name="password" placeholder="password">
                            <!-- Tambahkan name="password" -->
                            <button type="submit" class="btn">Register</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var menuItems = document.getElementById("MenuItems");
        function menutoggle() {
            if (menuItems.style.maxHeight == "0px") {
                menuItems.style.maxHeight = "200px";
            } else {
                menuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>

</html>