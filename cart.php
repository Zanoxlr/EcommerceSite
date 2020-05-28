<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <!-- CSS import-->
    <link rel="stylesheet" type="text/css" href="css\style.css" async>
    <!-- JS import-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script type="text/javascript" src="Js/methods.js"></script>
    <script type="text/javascript" src="Js/cartPage.js"></script>
</head>
<body>
    <!-- Header stuff-->
    <div class="header">
        <h1 style="margin: 30px; float: left;" onclick="location.href='index.php';" >ZTech</h1>
        <div class="container" onclick="location.href='cart.php';">
            <img src="img/shoppingCart.webp" class="cart">
            <label id="shopingCart" name="shopingCart" class="centered">0</label>
        </div>
        <div class="container" onclick="location.href='login.php';" >
            <img src="img/person-male.png" class="cart">
        </div>
    </div>
    <!-- Article stuff-->
    <article><h2 class="center">Your cart:</h2><div name="cart" id="cart"></div>
    <h2 id="Price" class="center">Price: </h2>
    <button class="buyButton" onclick="location.href='php/purchase.php';">Buy</button>
    </article>
    <!-- Footer stuff-->
    <footer class="footer">
        <h5>ZTech web store @2020</h5>
    </footer>
</body>
</html>