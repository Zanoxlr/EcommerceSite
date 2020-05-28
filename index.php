<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Main site</title>
    <!-- CSS import-->
    <link rel="stylesheet" type="text/css" href="css\style.css" async>
    <!-- JS import-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script type="text/javascript" src="Js/methods.js"></script>
    <script type="text/javascript" src="Js/importDBIndex.js"></script>
</head>
<body>
    <!-- Header stuff-->
    <div class="header">
        <h1 style="margin: 30px; float: left;" onclick="location.href='index.php';" >ZTech</h1>
        <input type="text" name="search" id="search" placeholder=" Search for products 🔍"
            class="searchbar" />
        <div class="container" onclick="location.href='cart.php';">
            <img src="img/shoppingCart.webp" class="cart">
            <label id="shopingCart" name="shopingCart" class="centered">0</label>
        </div>
        <div class="container" onclick="location.href='login.php';" >
            <img src="img/person-male.png" class="cart">
        </div>
    </div>
    <!-- Navigarot stuff-->
    <aside class="aside">
        <h3>
            <div>
                <form id="formHtml">
                    <!-- BrandID-->
                    <h2><b><label for="BrandID">Brands</label></b></h2>
                    <input type='radio' name='BrandID' value="-1" class='input'><label for="BrandID">All</label><br>
                    <br id="BrandID">
                    <!-- CategoryID-->
                    <h2><b><label for="CategoryID">Categories</label></b></h2>
                    <input type='radio' name='CategoryID' value="-1" class='input'><label for="CategoryID">All</label><br>
                    <br id="CategoryID">
                    <!-- Price-->
                    <h2><b><label for="Price">Price</label></b></h2>
                    <input type='radio' name='Price' value="ASC" class='input'><label for="ASC">Ascending</label><br>
                    <input type='radio' name='Price' value="DESC" class='input'><label for="DESC">Descending</label><br>
                    <input type='radio' name='Price' value="-1" class='input'><label for="All">All</label><br>
                    <!-- Rate-->
                    <h2><b><label for="Rate">Rate</label></b></h2>
                    <input type='radio' name='Rate' value="ASC" class='input'><label for="ASC">Ascending</label><br>
                    <input type='radio' name='Rate' value="DESC" class='input'><label for="DESC">Descending</label><br>
                    <input type='radio' name='Rate' value="-1" class='input'><label for="All">All</label><br>
                    <!-- Stock-->
                    <h2><b><label for="Stock">Stock</label></b></h2>
                    <input type='radio' name='Stock' value="1" class='input'><label for="In stock">In stock</label><br>
                    <input type='radio' name='Stock' value="0" class='input'><label for="Out of stock">Out of stock</label><br>
                    <input type='radio' name='Stock' value="-1" class='input'><label for="All">All</label><br>
                </form>
            </div>
        </h3>
    </aside>
    <!-- Article stuff-->
    <article>
        <div class="container-items clearfix">
            <!-- Here are going to be items from importDBindex.js -->
            <div class="inner" id="item"></div>
        </div>
    </article>
    <footer class="footer">
        <h5>ZTech web store @2020</h5>
    </footer>
</body>
</html>
