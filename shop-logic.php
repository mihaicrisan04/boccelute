<?php

session_start();

if (isset($_SESSION["user_id"])) {
    if (isset($_SESSION["cart"])) {
        if (isset($_POST["add"])) {
            if (in_array($_POST["product_id"], $_SESSION["cart"])) {
                echo "<script> alert(\"Product is already added in the cart\") </script>";
            }
            else {
                array_push($_SESSION["cart"], $_POST["product_id"]);
            }
        }
    }
    else {
        $_SESSION["cart"] = array();
    }
}

header("Location: shop.php");
exit;
