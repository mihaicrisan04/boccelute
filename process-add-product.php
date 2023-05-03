<?php

$mysqli = require __DIR__ . "/database.php";

if (isset($_POST["add-product"])) {
    
    if (empty($_POST["name"])) {
        die("No prodcut name added");
    }
    
    if (empty($_POST["descriere"])) {
        die("No prodcut description added");
    }
    
    if (empty($_POST["price"])) {
        die("No prodcut price added");
    }
    
    // if (!empty($_FILES["image"])) {
    //     die("No image added");
    // }


    $image = $_FILES["image"];   

    $image_file_name = $image["name"];
    $image_file_error = $image["error"];
    $image_file_tmp = $image["tmp_name"];

    $file_separate = explode(".", $image_file_name);
    $file_extension = strtolower($file_separate[1]);

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_extension, $extensions)) {

        $upload_image = "images/uploads/" . $image_file_name;
        move_uploaded_file($image_file_tmp, $upload_image);

        $sql = "INSERT INTO products (name, descriere, price, img_url)
            VALUES (?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();

        if (!$stmt->prepare($sql)) {
            die("SQL Error: " . $mysqli->error);    
        }

        $stmt->bind_param("ssss", 
                        $_POST["name"],
                        $_POST["descriere"],
                        $_POST["price"],
                        $upload_image);

        if ($stmt->execute()) {
            header("Location: shop.php");
            exit;
        }
        else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
}


