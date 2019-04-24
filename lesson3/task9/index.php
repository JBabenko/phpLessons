<?php

$translit = [
    'а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'yo',
    'ж' => 'j',
    'з' => 'z',
    'и' => 'i',
    'й' => 'j',
    'к' => 'k',
    'л' => 'l',
    'м' => 'm',
    'н' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ф' => 'f',
    'х' => 'h',
    'ц' => 'ts',
    'ч' => 'ch',
    'ш' => 'sh',
    'щ' => 'sh',
    'ъ' => 'j',
    'ы' => 'y',
    'ь' => '\'',
    'э' => 'e',
    'ю' => 'yu',
    'я' => 'ya',
    'А' => 'A',
    'Б' => 'D',
    'В' => 'V',
    'Г' => 'G',
    'Д' => 'D',
    'Е' => 'E',
    'Ё' => 'Yo',
    'Ж' => 'J',
    'З' => 'Z',
    'И' => 'I',
    'Й' => 'J',
    'К' => 'K',
    'Л' => 'L',
    'М' => 'M',
    'Н' => 'N',
    'Щ' => 'O',
    'П' => 'P',
    'Р' => 'R',
    'С' => 'S',
    'Т' => 'T',
    'У' => 'U',
    'Ф' => 'F',
    'Х' => 'H',
    'Ц' => 'Ts',
    'Ч' => 'Ch',
    'Ш' => 'Sh',
    'Щ' => 'Sh',
    'Ы' => 'Y',
    'Э' => 'E',
    'Ю' => 'Yu',
    'Я' => 'Ya'
];

function transliteration($inputStr, $rule) {

    $newStr = '';
    $splitedStr = preg_split ('//u', $inputStr);
    
    foreach ($splitedStr as $symbol) {

        if (preg_match('/[а-яА-Я]/', $symbol)) {

            foreach ($rule as $key => $item) {
                if ($symbol === $key) {
                    $newStr .= $item;
                    break;
                }
            } 

        } elseif (preg_match('/\s/', $symbol)) {
            $newStr .= '_';
        } else {
            $newStr .= $symbol;
        }
    }

    return $newStr;
}

echo transliteration('Привет мир! Я сообщение, обработанное транслитом.', $translit);
