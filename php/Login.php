<?php

require_once "Secret.php";

// Variables
$emailInput = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$passInput = filter_input(INPUT_POST, "password", FILTER_UNSAFE_RAW);

$error = false;
$errEmail = "";
$errPass = "";
$action = "";

// Verification

if ($emailInput == "" || $emailInput === false || $emailInput === null) {
    $error = true;
    $errEmail = "Email invalide";
}

if ($passInput == "" || $passInput === null) {
    $error = true;
    $errPass = "Mot de passe vide";
}

// Test
if($error == false && md5($passInput) == $superSecret){
    $action = "action=\"../Accueil.html\"";
}else if($error == true){
    $action = "";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Stark Industrie</title>
</head>

<body>
    <header>
        <img src="../img/logoStarkIndustriesinvisible.png" alt="">
        <h1>Stark game store</h1>
    </header>
    <main id="mainLogin">
        <section>
            <form method="post" <?= $action ?>>
                <h2 id="h2Login">Login</h2>
                <br>
                <div class="divLogin">
                    <label for="email">Enter votre email : </label>
                    <input type="email" name="email" id="email" placeholder="...@eduge.ch" value="<?= $emailInput ?>" required>
                    <span><?= $errEmail ?></span>
                </div>
                <br>
                <div class="divLogin">
                    <label for="password">Entez votre mot de passe :</label>
                    <input type="password" name="password" id="password" placeholder="******" required>
                    <span><?= $errPass ?></span>
                </div>
                <br>
                <button type="submit">Envoyer</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy;Stark Industries | Carvalho Bryan | Saeed Jamal | Pereira Leonardo</p>
        <p>Wistiti Game</p>
    </footer>
</body>

</html>