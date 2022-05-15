<?php

$num  = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
$suites  = array("♥", "♦", "♣", "♠");

for ($i = 0; $i < count($suites); $i++) {
    for ($j = 0; $j < count($num); $j++) {
        $deck[] = $num[$j] . '-' . $suites[$i];
    }
}

echo "<pre>".print_r($deck, true)."</pre>"; // DEBUG


?>


