<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <!-- import CSS -->
    <link rel="stylesheet" type="text/css" href="css\style.css" async>
    <!-- import JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="Js/importProduct.js"></script>
    <script type="text/javascript" src="Js/methods.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
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
    <article><div id="productDIV"></div>
    </article>
    <!-- Footer stuff-->
    <footer class="footer">
        <h5>ZTech web store @2020</h5>
    </footer>
</body>
</html>