<?php
function verificationMdp($mdp)
{   
    $carac = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $mdp = trim($mdp);
    $mdp = "nb1";
    for ($i = 0; $i < count($carac); $i++) {

        for ($j = 0; $j < count($carac); $j++) {

            for ($k = 0; $k < count($carac); $k++) {
                $stockage1 = $carac[$i] . $carac[$j] . $carac[$k];
                if ($stockage1 === $mdp) {
                    return true;
                }
                for ($l = 0; $l < count($carac); $l++) {
                    $stockage2 = $carac[$i] . $carac[$j] . $carac[$k] . $carac[$l];
                    if ($stockage2 === $mdp) {
                        return true;
                    }
                    for ($m = 0; $m < count($carac); $m++) {
                        $stockage3 = $carac[$i] . $carac[$j] . $carac[$k] . $carac[$l] . $carac[$m];
                        if ($stockage3 === $mdp) {
                            return true;
                        }
                    }
                }
            }
        }
    }
}


$saisie = $_GET['saisie'] ?? "";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Eric Charbonnier 2295209">
    <meta name="description" content="Activié sur le mot de passe, Projet Final, 420-11E-MA ENVIRONNEMENT DE DÉVELOPPEMENT WEB 1">
    <title> Projet final - Eric Charbonnier</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Projet final <br>-<br> Environnement de développement web 1</h1>
        <img src="img/cegep-logo.png" alt="logo cegep maisonneuve" width="300" height="300">
    </header>
    <nav role="menubar">
        <a href="index.html" class="menu" role="menuitem">Accueil</a>
        <a href="temps.php" class="menu" role="menuitem">Temps</a>
        <a href="cartes.php" class="menu" role="menuitem">Cartes</a>
        <a href="password.php" class="menu active" role="menuitem">Password</a>
    </nav>
    <main>
        <section>
            <h4>Le mot de passe.</h4>
            <p>Page 4: Un formulaire en haut de page demandant à un utilisateur d'entrer un mot de passe de 4 symboles incluant les lettres de l'alphabet en minuscule et les chiffres (vous pouvez assumer que les utilisateurs ne feront pas d'erreurs) avec un bouton de soumission. Une fois le bouton appuyer, afficher le temps nécessaire pour effectuer une attaque par force brute sur le mot de passe.</p>
        </section>
        <h4>Temps de détection d'une chaîne de 4 caractères</h4>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                <input type="password" name="saisie" value="<?= $saisie ?>" placeholder="entrez 4 caractères parmi les lettres minuscules de a à z et les chiffres de 0 à 9" maxlength="4" pattern="[abcdefghijklmnopqrstuvwxyz0123456789]{4}">
                <input type="submit" value="Envoyer">
            </form>

                <?php if ($saisie !== ""){
                        $start_time = microtime(true);
                        $retour = verificationMdp($saisie);
                        $end_time = microtime(true);
                        $execution_time = ($end_time - $start_time); ?>
            <p><?php echo "il faudra " .  round($execution_time, 4) . " secondes pour trouver le mot de passe: " . $saisie . "<br>";
        unset($saisie);
        }
        ?></p>
    </main>
</body>

</html>
