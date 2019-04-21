<?php

$a = -8;
$b = 2;

if ($a >= 0 && $b >= 0 ) {
    echo $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo $a * $b;
} else {
    echo $a + $b;
}
