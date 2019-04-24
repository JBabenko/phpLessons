<?php

$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт']
];

foreach ($regions as $region => $cities) {

    echo $region . '<br/>';

    foreach ($cities as $city) {

        echo $city;
        if ( $city !== end($cities) ) {
            echo ', ';
        }
    }
    echo '<br/>';
}
