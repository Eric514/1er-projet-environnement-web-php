<?php

define('NB_HEURES',   12);
define('NB_MINUTES', 60);

date_default_timezone_set('America/Toronto');
$heuresJ = date("h");
$minutesI = date("i");
// echo "Heure actuelle : <br>" . $heuresJ . " h " . $minutesI;
// echo "<br>";
$now = "XXXX";
$arr = array();
for ($j = 0; $j < 12; $j++) {
    $arr[] = [];
    for ($i = 0; $i < 60; $i++) {
        $arr[$i][$j] = ($j+1) . " h " . str_pad($i, 2, "0", STR_PAD_LEFT);
    }
}


$int_heuresJ = (int) $heuresJ;
$int_minutesI = (int) $minutesI;
$heureMinute = $_GET['heureMinute'] ?? "";
$heure   = "";
$minute = "";
$exact = false;
$heureSaisie = "";
$minuteSaisie = "";
if ($heureMinute !== "") {
    $t = explode(':', $heureMinute);
    $heureSaisie   = (int) ($t[0]);
    $minuteSaisie = (int) ($t[1]);

        if ($int_heuresJ === $heureSaisie && $int_minutesI === $minuteSaisie)
            $exact = true;
            $heureMinute = "$heureSaisie:$minuteSaisie";
} else {
    // $heureMinute = "";
    $exact = false;
}
        if ($heureMinute === "") {
            $textErr = true;
        } else {
            $heureMinute = false;
        }


?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Eric Charbonnier 2295209">
        <meta name="description" content="Activité du Temps, Projet Final, 420-11E-MA ENVIRONNEMENT DE DÉVELOPPEMENT WEB 1">
        <title> Projet final - Eric Charbonnier</title>
        <link rel="stylesheet" href="css/style.css">
        <style>
            body {

                text-align: center;
            }

            .tableStyle {
                border: 5px solid;
                border-collapse: collapse;
                margin: auto;
                border-color: #2ec4b6 #cbf3f0 #ffbf69 #ff9f1c;
            }

            .tdtrStyle {
                border: 2px solid #fbc4ab;
                border-collapse: collapse;
                padding: 5px 5px;
                
            }

            .exact {
                color: green;
                font-weight: bold;
            }

            .inexact {
                color: red;
                font-weight: bold;
            }

            .courant {
                color: blue;
                font-weight: bold;

            }

            .normal {
                color: black;
                opacity: 0.5;
            }
            
        </style>
    </head>

    <body>
        <header>
            <h1>Projet final <br>-<br> Environnement de développement web 1</h1>
            <img src="img/cegep-logo.png" alt="logo cegep maisonneuve" width="300" height="300">
        </header>
        <nav role="menubar">
            <a href="index.html" class="menu" role="menuitem">Accueil</a>
            <a href="temps.php" class="menu active" role="menuitem">Temps</a>
            <a href="cartes.php" class="menu" role="menuitem">Cartes</a>
            <a href="password.php" class="menu" role="menuitem">Password</a>
        </nav>
        <main>

            <h4>Le jeu du temps.</h4>
            <p>Page 2: Un formulaire en haut de page demandant à un utilisateur de deviner l'heure avec un bouton de
                soumission. Une fois le bouton appuyer, afficher un tableau de temps avec l'heure inscrit dans chaque case.
                Si le temps de l'utilisateur est exact, mettre la case en vert, sinon mettre la case indiquant l'heure de
                l'utilisateur en rouge et l'heure courante en bleu.</p>
            <h5>Devinez l'heure qu'il est:</h5>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                <input type="text" name="heureMinute" value="<?= $heureMinute ?>" placeholder="entrez sous la forme heure(s):minute(s)">
                <input type="submit" value="Envoyer">
            </form>

            <!-- if (($minuteSaisie == "") || ($heureSaisie == "")) { -->
                
                <?php echo '<table class="tableStyle">';
            for ($i = 0; $i < count($arr); $i++) {
                echo '<tr class="tdtrStyle">';
                for ($j = 0; $j < count($arr[$i]); $j++) {
                    if (($i == $minutesI && $j == ($heuresJ-1)) && ($exact == true)) {
                        echo '<td class="tdtrStyle exact">' .  $arr[$i][$j] . "</td>";
                    } else if ((($i == $minutesI && $j == $heuresJ-1)) && ($exact == false)) {
                        echo '<td class="tdtrStyle courant">' .  $arr[$i][$j] . "</td>";
                    } else if ((($i == $minuteSaisie && $j == $heureSaisie-1)) && ($i !== $minutesI || $j !== ($heuresJ-1))) {
                        echo '<td class="tdtrStyle inexact">' .  $arr[$i][$j] . "</td>";
                    } else {
                        echo '<td class="tdtrStyle normal">' .  $arr[$i][$j] . "</td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
        
            ?>
        </main>
    </body>

    </html>