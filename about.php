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
    <title>About</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/about.css">
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
        
        <div class="shop-profile-wrapper">
            <div class="shopping">
                <a href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="false"></i></a>
                <span class="quantity">
                    <?php 
                        if (isset($_SESSION["cart"])) {
                            $count = count($_SESSION["cart"]);
                            if ($count) {
                                echo $count;
                            }
                            else {
                                echo "0";
                            }
                        }   
                        else {
                            echo "0";
                        }
                        ?>
                </span>
            </div>

            <div class="profile">
                <a href="profile.php"><i class="fa fa-user"></i></a>
            </div>
        </div>

        <div class="name-log-sign-container">
            <?php if(isset($user)): ?>
                <p class="name"><?= htmlspecialchars($user["name"]) ?></p>
                <p><a href="logout.php">Log out</a></p>
            <?php else: ?>
                <p><a href="login.php">Log in</a> or <a href="signup.html">Sign up</a></p>
            <?php endif; ?>
        </div>

    </header> 


    <div class="about-page">
            <div class="content">
                <h1>Title</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ea nihil, quasi eos fuga sed, cumque impedit rerum tempora vitae doloribus amet esse unde accusamus ipsa at illum, dignissimos itaque!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ea nihil, quasi eos fuga sed, cumque impedit rerum tempora vitae doloribus amet esse unde accusamus ipsa at illum, dignissimos itaque!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ea nihil, quasi eos fuga sed, cumque impedit rerum tempora vitae doloribus amet esse unde accusamus ipsa at illum, dignissimos itaque!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi ea nihil, quasi eos fuga sed, cumque impedit rerum tempora vitae doloribus amet esse unde accusamus ipsa at illum, dignissimos itaque!</p>
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
</body>
</html>