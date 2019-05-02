<?php

echo getCurrentTime();

function getCurrentTime() {
    $hours = date('H');
    $minutes = date('i');

    $hourEnds = array('час', 'часа', 'часов');
    $minuteEnds = array('минута', 'минуты', 'минут');

    return "$hours ".getRusEnd($hours, $hourEnds)." $minutes ".getRusEnd($minutes, $minuteEnds);
}

function getRusEnd($num, $timeEnds) {
    if ($num >= 11 && $num <= 19) {
        return $timeEnds[2];
    }

    $num %= 10;

    if ($num === 1) {
        return $timeEnds[0];
    } elseif ($num >=2 && $num <= 4) {
        return $timeEnds[1];
    } else {
        return $timeEnds[2];
    }
}
