<?php

$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт']
];

foreach ($regions as $region => $cities) {

    echo $region . '<br/>';

    foreach ($cities as $city) {

        $firstLetter = preg_split ('//u', $city)[1];

        if ($firstLetter === 'К') {
            echo $city;
            if ( $city !== end($cities) ) {
                echo ', ';
            }
        }
    }
    echo '<br/>';
}
