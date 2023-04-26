<?php 

    session_start();

    if (isset($_SESSION["user_id"])) {
        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <header>
        <img class="logo "src="images/logo.png" alt="Logo Image">
        <nav>
            <ul class="nav-links" >
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
            <a class="cta"href="">
                <button>Contact</button>
            </a>
        </nav>

        <div class="shopping">
            <i class="fa fa-shopping-cart" aria-hidden="false"></i>
            <span class="quantity">0</span>
        </div>

        <div class="profile">
            <a href="profile.php"><i class="fa fa-user"></i></a>
        </div>
    </header>   

    <div class="store-wrapper">
        <div class="list">

        </div>
    </div>
    

    <div class="card">
        <h1>Card</h1>
        <ul class="listCard"></ul>
        <div class="checkout">
            <div class="total">0</div>
            <div class="closeShopping">Close</div>
        </div>
    </div>

    
    <footer>
        <div class="footer-content">
            <h3>Boccelute</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore autem eum odio ducimus fugit?</p>
            <ul class="socials">
                <li><a href="https://www.instagram.com/boccelute"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </footer>


    <script src="js/shopping.js"></script>
</body>
</html>