<?php

function power($val, $pow) {
    if ($pow <= 1) {
        return $val;
    }
    return power($val, $pow - 1) * $val;
}

echo power(2, 5);
