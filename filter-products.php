<?php

require "operations.php";

if (isset($_POST["category"])) {
    $category = $_POST["category"];

    if ($category === "") {
        $products = getAllProducts();
    }
    else if ($category === "increasing_order") {
        $products =  getIncreasingOrderProducts();
    }
    else {
        $products = getDecreasingOrderProducts();
    }

    echo json_encode($products);
}