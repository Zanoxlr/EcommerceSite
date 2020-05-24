<!DOCTYPE html>
<html>
<head>
    <!-- import CSS -->
    <link rel="stylesheet" type="text/css" href="css\loginRegister.css" async>
    <link rel="stylesheet" type="text/css" href="css\style.css" async>
    <!-- import JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="Js/methods.js"></script>
    <script type="text/javascript" src="Js/login.js"></script>
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
			<form autocomplete="on">
                <!-- username -->
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
                <input type="text" name="username" placeholder="Username" id="inputUsername" required>
                <!-- password -->
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
                <input type="password" name="password" placeholder="Password" id="inputPassword" required>
                <!-- problems -->
                <br><p id="labelInfo"></p>
                <!-- register -->
                <h4 onclick="location.href='register.php';">Havent got the account? Click here to register</h4>
                <!-- logout -->
                <h5 onclick="location.href='php/logout.php';">Logout</h5>
                <!-- submit -->
                <input type="button" id="submit" value="Login">
                <i class="fas fa-lock"></i>
			</form>
		</div>
    </article>
    <footer class="footer">
        <h5>a webstore</h5>
    </footer>
</body>
</html>
