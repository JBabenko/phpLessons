<?php

function getSum($arg1, $arg2) {
    return $arg1 + $arg2;
}
function getSub($arg1, $arg2) {
    return $arg1 - $arg2;
}
function getMult($arg1, $arg2) {
    return $arg1 * $arg2;
}
function getDiv($arg1, $arg2) {
    return $arg1 / $arg2;
}

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'сложение':
            return getSum($arg1, $arg2);
        
        case 'вычитание': 
            return getSub($arg1, $arg2);

        case 'умножение': 
            return getMult($arg1, $arg2);

        case 'деление': 
            return getDiv($arg1, $arg2);
    }
}
