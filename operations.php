<?php

///pt adaugare de produse
function inputFields($name, $value, $type) {
    $elem = "<div>
                <label for=\"'$name'\">" . $name . "</label>
                <input type='$type' id='$' name='$name' value='$value' autocomplete=\"off\">
            </div>";
    echo $elem;
}

///pt afisare cardurilor cu produse
function addCard($product_id, $name, $descriere, $price, $image_url) {
    // trb sa schimb actino cand termin
    $elem = "
    <form action=\"shop-logic.php\" method=\"post\">
        <div class=\"product-card\">
            <img src=\"" . $image_url . "\" alt=\"Product Image\">
            <h2 class=\"product-name\">" . $name . "</h2>
            <p class=\"descriere\">" . $descriere . "</p>
            <p class=\"price\">" . $price . " lei</p>
            <button onclick=\"\" name=\"add\">Add to Cart</button>
            <input type=\"hidden\" name=\"product_id\" value=\" $product_id \">
        </div>
    </form>";
    echo $elem;
}   

function addCartItem($product_id, $name, $descriere, $price, $image_url) {
    ///de adaugat modificare de cantitati
    /// + buton de remove
    $elem = "
    <li>
        <form action=\"cart-logic.php\" method=\"post\">
            <img src=\"$image_url\" alt=\"Product Image\">
            <div class=\"product-name\">$name</div>
            <div class=\"price\">
                <div>$price</div>
                <div>lei</div>
            </div>
            <button class=\"remove-btn\" name=\"remove\">Remove</button>
            <input type=\"hidden\" name=\"product_r_id\" value=\" $product_id \">
        </form>
    </li>";
    echo $elem;
}

function displayCartItems($product_id, $products) {
    $_SESSION["total"] = 0;
    
    foreach($product_id as $id) {
        foreach($products as $product) {
            $product_id = $product["product_id"];
            $name = $product["name"];
            $descriere = $product["descriere"];
            $price = $product["price"];
            $image_url = $product["img_url"];

            if ($id == $product_id) {
                addCartItem($product_id, $name, $descriere, $price, $image_url);

                $_SESSION["total"] += intval($price);
            }
        }
    }
}

function display_products($products) {
    foreach($products as $product) {
        $product_id = $product["product_id"];
        $name = $product["name"];
        $descriere = $product["descriere"];
        $price = $product["price"];
        $image_url = $product["img_url"];

        addCard($product_id, $name, $descriere, $price, $image_url);
    }
}

function getAllProducts() {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM products";

    $result = $mysqli->query($sql);

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

function getIncreasingOrderProducts() {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM products
            ORDER BY price ASC";

    $result = $mysqli->query($sql);

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

function getDecreasingOrderProducts() {
    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM products
            ORDER BY price DESC";

    $result = $mysqli->query($sql);

    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}