<?php

function replace_spaces($inputStr) {
    
    $newStr = '';
    $splitedStr = preg_split ('//u', $inputStr);

    foreach ($splitedStr as $symbol) {
        if (preg_match('/\s/', $symbol)) {
            $symbol = '_';
        }
        $newStr .= $symbol;
    }

    return $newStr;
}

echo (replace_spaces('Замененны пробелы на подчеркивания'));
