<?php

function verificationMdp($mdp) {
$carac = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",0,1,2,3,4,5,6,7,8,9];
$mdp = trim($mdp);
$mdp = "nb1";
    for ($i = 0; $i < count($carac); $i++) {

        for ($j = 0; $j < count($carac); $j++) {

            for ($k = 0; $k < count($carac); $k++) {
                $stockage1 = $carac[$i].$carac[$j].$carac[$k];
                if ($stockage1 === $mdp) {
                    return true;
                }
                for ($l = 0; $l < count($carac); $l++) {
                    $stockage2 = $carac[$i].$carac[$j].$carac[$k].$carac[$l];
                    if ($stockage2 === $mdp) {
                        return true;
                    }
                    for ($m = 0; $m < count($carac); $m++) {
                        $stockage3 = $carac[$i].$carac[$j].$carac[$k].$carac[$l].$carac[$m];
                        if ($stockage3 === $mdp) {
                            return true;
                        }
                    }
                }
            }
        }
    }
}

$mdp1 = "test1";
$start_time = microtime(true);
$retour = verificationMdp($mdp1);
$end_time = microtime(true);
$execution_time = ($end_time - $start_time);
echo "il faudra " .  round($execution_time, 4) . " secondes pour trouver le mot de passe: " . $mdp1 . "<br>";


?>

