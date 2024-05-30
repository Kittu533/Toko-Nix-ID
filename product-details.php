<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nix.ID | Ecommerce website</title>
        <link rel="stylesheet" href="./style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <!--added a cdn link by searching font awesome4 cdn and getting this link from https://www.bootstrapcdn.com/fontawesome/ this url*/-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body>
    <div class ="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a style="font-weight: 700;" href="index.html">NIX.ID</a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="/Nix-ID/index.html">Home</a></li>
                         <li><a href="/Nix-ID/product.html">Products</a></li>
                         <li><a href="/Nix-ID/">Contact</a></li>
                         <li><a href="account.html">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="images/cart.png" width="30px" height="30px"></a>
                <img src="images/menu.png" class="menu-icon" onClick="menutoggle()" >
            </div>
        </div>
    </div>
   <!------------------------------ Single product details------------------------------>
   <div class="small-container single-product">
                  
    <!--<h2 class="title" >Featured Products</h2>-->
    <div class="row">
            <div class="col-2">
                <img src="./images/p1 (4).jpg" width="100%" id="productImg">
                
                
                <div  class="small-img-row mt-2 ">
                    <div class="small-img-col">
                        <img src="./images/p1 (1).jpg" width="100%" class="small-img">
                    </div>
                     <div class="small-img-col">
                        <img src="./images/p1 (2).jpg" width="100%" class="small-img">
                    </div>
                     <div class="small-img-col">
                        <img src="./images/p1 (3).jpg" width="100%" class="small-img">
                    </div>
                     <div class="small-img-col">
                        <img src="./images/p1 (5).jpg" width="100%" class="small-img">
                    </div>
                </div>
            </div>
        
            <div class="col-2">
                <p>Home / Shoes</p>
                <h1>Ventele X Jerome</h1>
                <h4>Rp.419.900  </h4>
                <select>
                    <option>Select Size</option>
                    <option>39<!--Small (s)--></option>
                    <option>40<!--Medium (M)--></option>
                    <option>41<!--Large (L)--></option>
                    <option>42<!--XL--></option>
                    <option>43<!--XXL--></option>
                </select>
                <input type="number" values="1">
                <a href="cart.html" class="btn">Add to Cart</a>
                <h3>Product Details <i class="fa fa-indent" ></i></h3>
                <br>
                <p>Sepatu ini merupakan hasil kolaborasi  antara ventela X jerome poline yang jumlahnya terbatas.Segera dapatkan sepatu limited edition ini hanya di toko ini</p>
            </div>
        </div>
    </div>


<!----------------------------------Title------------------------------------->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <a href="./product.html"><p>View More</p></a>
        </div>
    </div>
        
<!----------------------------------products------------------------------------->
        <div class="small-container">
            <div class="row">
                    <div class="col-4">
                        <a href="/Nix-ID/product-details.html"><img src="/Nix-ID/images/6.jpg"></a>
                        <a href="products-details.html"><h4>Ventela New Public Black Natural</h4></a>
                        <div class="rating">
                            
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star-half-o" ></i>
                            <i class="fa fa-star-o" ></i>
                        </div>
                        <p>Rp.329.000</p>
                    </div>
                    <div class="col-4">
                        <a href="/Nix-ID/product-details.html"><img src="/Nix-ID/images/2.jpg"></a>
                        <h4>Patrobas New Ivan low olympic blue</h4>
                        <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star-half-o" ></i>
                        </div>
                        <p>Rp.309.000</p>
                    </div>
                    <div class="col-4">
                        <a href="/Nix-ID/product-details.html"><img src="/Nix-ID/images/1.jpg"></a>
                        <h4>Reebk Fluxlite Grey Original
                        </h4>
                        <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star-o" ></i>
                        </div>
                        <p>Rp.499.000</p>
                    </div>
                    <div class="col-4">
                        <a href="/Nix-ID/product-details.html"><img src="/Nix-ID/images/7.jpg"></a>
                        <h4>Ventela Public Low black natural</h4>
                        <div class="rating">
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star-o" ></i>
                            <i class="fa fa-star-o" ></i>
                        </div>
                        <p>Rp.279.000</p>
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
        <!-----------------------------------js for toggle menu----------------------------------------------->
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
        
        <!-----------------------js for product gallery-------------------->
        
        <script>
            var productImg=document.getElementById("productImg");
            var smallImg=document.getElementsByClassName("small-img");
            
            smallImg[0].onclick=function(){
                productImg.src=smallImg[0].src;
            }
             smallImg[1].onclick=function(){
                productImg.src=smallImg[1].src;
            }
              smallImg[2].onclick=function(){
                productImg.src=smallImg[2].src;
            }
               smallImg[3].onclick=function(){
                productImg.src=smallImg[3].src;
            }
            
            
        </script>
</body>
</html>