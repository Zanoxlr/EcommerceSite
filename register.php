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
			<h1>Register</h1>
			<form action="php/registerUser.php" method="post" autocomplete="on" type="hidden">
                <!-- email -->
                <label for="email">
					<i class="fas fa-envelope"></i>
				</label>
                <input type="email" name="email" placeholder="Email" id="email" required>
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
                <!----> 
                <label for="passwordD">
					<i class="fas fa-lock"></i>
				</label>
                <input type="password" name="passwordD" placeholder="Verify password" id="passwordD" required>
                <h4 onclick="location.href='login.php';">Already have an account? Click here to login</h4>
                <!-- submit -->
                <input type="submit" value="Register">
                <i class="fas fa-lock"></i>
                
			</form>
		</div>
    </article>
    <footer class="footer">
        <h5>a webstore</h5>
    </footer>
</body>

</html>
