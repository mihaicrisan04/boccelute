<?php
    require_once('./operations.php');

    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <!-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script> -->
    <title>Add Product</title>
</head>

<body>

    <h1>Add Product</h1>

    <form action="process-add-product.php" method="post" id="add_product" enctype="multipart/form-data">

        <?php
            inputFields("name", "", "text");
            inputFields("descriere", "", "text");
            inputFields("price", "", "text");
            inputFields("image", "", "file");
        ?>

        <br>

        <button class="add-product-btn" type="submit" name="add-product">Add Product</button>

    </form>

</body>

</html>