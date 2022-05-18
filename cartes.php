<?php

$num  = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
$suites  = array("♥", "♦", "♣", "♠");

for ($i = 0; $i < count($suites); $i++) {
    for ($j = 0; $j < count($num); $j++) {
        $deck[] = $num[$j] . '-' . $suites[$i];
    }
}


/* https://stackoverflow.com/questions/65970/what-is-the-best-way-to-randomize-an-arrays-order-in-php-without-using-the-shuf */
/* Auteur: Fixedd */
/* La fonction ci-dessous est utilisée afin de mélanger les indices d'un tableau */


$deckBrasse = [];
while (count($deck) > 0) {
    $indiceAleatoire = rand(0, count($deck) - 1);
    $extraction = array_splice($deck, $indiceAleatoire, 1);
    $deckBrasse[] = $extraction[0];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Eric Charbonnier 2295209">
    <meta name="description" content="Activité sur le jeu de cartes, Projet Final, 420-11E-MA ENVIRONNEMENT DE DÉVELOPPEMENT WEB 1">
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
        <a href="cartes.php" class="menu active" role="menuitem">Cartes</a>
        <a href="password.php" class="menu" role="menuitem">Password</a>
    </nav>
    <main>
        <h4>Jeu de cartes.</h4>
        <p>Page 3: Une page affichant un paquet de cartes brassé de manière aléatoire et différente à chaque
            rafraîchissement.</p><br><br>
        <section>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                <input type="submit" value="BRASSER">
            <p> <?php echo implode(", ", $deckBrasse) ;?> </p>
        </section>
    </main>
</body>

</html>


