<?php

session_start();


//remove item from cart
if (isset($_SESSION["cart"])) {
    if (isset($_POST["remove"])) {
        if (!in_array($_POST["product_r_id"], $_SESSION["cart"])) {
            echo "<script> alert(\"Product is already removed from the cart\") </script>";
        }
        else {
            $item_id = array(
                "product_r_id" => $_POST["product_r_id"]
            );

            $_SESSION["cart"]=array_diff($_SESSION["cart"], $item_id);
        }
    }   
}
else {
    $_SESSION["cart"] = array();
    if (!isset($_SESSION["total"])) {
        $_SESSION["total"] = 0;
    }
}


//place order
if (isset($_POST["order"])) {
    $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM user
                WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);
}


header("Location: cart.php");
exit;