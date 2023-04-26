<?php

    $is_invalid = false;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //conectare la baza de date
        $mysqli = require __DIR__ . "/database.php";

        //pt ca email e string trebuie pus in acolade
        //sprintf holder pt un string in comanda sql unde apare %s
        $sql = sprintf("SELECT * FROM user
                WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));

        //query returneaza un result object din baza de date
        $result = $mysqli->query($sql);

        //ca sa luam dataele din result object e nevoie de fetch_assoc() -> associative array
        $user = $result->fetch_assoc();

        if ($user) {

            if (password_verify($_POST["password"], $user["password_hash"])) {
                
                // stochez in session id-ul userului pt a putea fi folosit pe pagina de home
                session_start();

                session_regenerate_id();

                $_SESSION["user_id"] = $user["id"];

                header("Location: index.php");
                exit;
            }
        }

        $is_invalid = true;
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Login</title>
</head>

<body>

    <h1>Login</h1>

    <!-- verificare ca login sa fie in regula-->
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

    <form method="post">
        <div>
            <label for="email">Email</label>
            <!-- value pt a ramane email-ul in form in caz ca ceva gresit la logare,
             initial value = null cand nu s-a introdus niciun email -->
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <button>Log in</button>
    </form>

</body>

</html>
