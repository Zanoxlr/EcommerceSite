<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- import CSS -->
    <link rel="stylesheet" type="text/css" href="css\loginRegister.css" async>
    <link rel="stylesheet" type="text/css" href="css\style.css" async>
    <!-- import JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="Js/methods.js"></script>
    <script type="text/javascript" src="Js/register.js"></script>
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
    <article>
    <div class="register">
			<h1>Register</h1>
			<form autocomplete="on" type="hidden">
                <!-- email -->
                <label for="email">
					<i class="fas fa-envelope"></i>
				</label>
                <input type="email" name="email" placeholder="Email" id="inputMail" required>
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
                <!-- repeat password --> 
                <label for="passwordD">
					<i class="fas fa-lock"></i>
				</label>
                <input type="password" name="passwordD" placeholder="Verify password" id="inputPasswordRepeat" required>
                <h4 onclick="location.href='login.php';">Already have an account? Click here to login</h4>
                <!-- problems -->
                <br><p id="labelInfo"></p>
                <!-- submit -->
                <input type="button" id="submit" value="Register">
                <i class="fas fa-lock"></i>
			</form>
		</div>
    </article>
    <footer class="footer">
        <h5>ZTech web store @2020</h5>
    </footer>
</body>
</html>