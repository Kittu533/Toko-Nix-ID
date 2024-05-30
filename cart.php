<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <title>All Products - Redstore</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <!--added a cdn link by searching font awesome4 cdn and getting this link from https://www.bootstrapcdn.com/fontawesome/ this url*/-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body>
        <!--<div class ="header">-->
        
    <div class ="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a style="font-weight: 700;" href="index.html">NIX.ID</a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.html">Home</a></li>
                         <li><a href="/Nix-ID/product.html">Products</a></li>
                         <li><a href="account.html">Account</a></li>

                    </ul>
                </nav>
                <a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onClick="menutoggle()" >
            </div>
          
        </div>
    </div>
    <!--</div>-->
    
        
        <!------------------------------ cart items details------------------------------>

        <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="./images/4.jpg">
                        <div>
                            <p>New balance air compact ind</p>
                            <small>Harga : Rp.499.000</small><br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" vlaue="1"></td>
                <td>Rp.299.000</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="/Nix-ID/images/5.jpg">
                        <div>
                            <p>Ventala white rose </p>
                            <small>Harga : Rp.299.000</small><br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" vlaue="1"></td>
                <td>Rp.299.000</td>
            </tr>
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="/Nix-ID/images/8.jpg">
                        <div>
                            <p>Ventela Full white           </p>
                            <small>Harga : Rp.299.000</small><br>
                            <a href="">Remove</a>
                        </div>
                    </div>
                </td>
                <td><input type="number" vlaue="1"></td>
                <td>Rp.299.000</td>
            </tr>
            </table>
            
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td>Rp.999.000</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>Rp.999.000</td>
                    </tr>
                    <tr >
                        <td colspan="2" ><button class="btn">Bayar</button></td> 
                    </tr>
                </table>
            </div>
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
            var menuItems=document.getElementById("MenuItems");
            
            MenuItems.style.maxHeight="0px";
            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px"){
                    MenuItems.style.maxHeight="200px";
                }
                else{
                    MenuItems.style.maxHeight="0px";
                }
            }
        </script>
     
    </body>
</html>