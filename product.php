<?php
    include('php/database_connection.php');
    include("php/sess.php");

    $id = $_GET["id"];
    $queryReturn = "";

    $query = "SELECT FROM produkti WHERE ID = $id";

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row)
    {        
        $queryReturn .="<div class='item'><picture><img src='img/".$row[0]."class='img'><p>".$row[1]."</p><p>".$row[2]."€</p><p>".$row[3]."</p><button onClick='AddCookies(".$row[0]."," + 1 + ")'>Add</button><button onClick='AddCookies(".$row[0]."," + -1 + ")'>Subtract</button><button onClick='RemoveCookies(".$row[0].")'>Delete</button></picture></div > ";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css\style.css" async>
    <meta charset="UTF-8">
    <title>Main site</title>
    <!--<script src="import_export.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="Js/importProduct.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
</head>
<body>

    <!-- Header stuff-->
    <div class="header">
        <h1 style="margin: 30px; float: left;" onclick="location.href='index.php';" >WebStore</h1>
        <div class="container" onclick="location.href='cart.php';">
            <img src="img/shoppingCart.webp" class="cart">
            <label id="shopingCart" name="shopingCart" class="centered">0</label>
        </div>
        <div class="container" onclick="location.href='login.php';" >
            <img src="img/person-male.png" class="cart">
        </div>
    </div>
    <!-- Article stuff-->
    <article><?php echo $queryReturn; ?><div id="productDIV"></div>
   
    </article>
     


    <!-- Header stuff-->
    <footer class="footer">
        <h5>a webstore</h5>
    </footer>
</body>
</html>