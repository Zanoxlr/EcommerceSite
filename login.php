<?php include("php/sess.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css\loginRegister.css" async>
    <link rel="stylesheet" type="text/css" href="css\style.css" async>
    <meta charset="UTF-8">
    <title>Main site</title>
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
    <article>
    <div class="register">
			<h1>Login</h1>
			<form action="php/loginUser.php" method="post" autocomplete="on">
                <!-- username -->
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
                <input type="text" name="username" placeholder="Username" id="username" required>
                <!-- password -->
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
                <input type="password" name="password" placeholder="Password" id="password" required>
                <h4 onclick="location.href='register.php';">Havent got the account? Click here to register</h4>
                <h5 onclick="location.href='php/logout.php';">Logout</h5>
                <!-- submit -->
                <input type="submit" value="Login">
                <i class="fas fa-lock"></i>
                
			</form>
            
		</div>
    </article>
    <footer class="footer">
        <h5>a webstore</h5>
    </footer>
</body>

</html>
