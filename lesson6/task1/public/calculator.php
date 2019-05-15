<?php

$arg1 = isset($_GET['arg1']) ? $_GET['arg1'] : null;
$arg2 = isset($_GET['arg2']) ? $_GET['arg2'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : null;

if ($arg1 === null || $arg1 === '' || $arg2 === null || $arg2 === '' ) {
  echo 'Напишите два аргумента для выполнения';
} else {
  switch ($action) {
    case 'plus':
      echo 'Результат: ' . ((int)$arg1 + (int)$arg2);
      break;
    case 'minus':
      echo 'Результат: ' . ((int)$arg1 - (int)$arg2);
      break;
    case 'multiplication':
      echo 'Результат: ' . ((int)$arg1 * (int)$arg2);
      break;
    case 'division':
      if ($arg2 != 0) {
        echo 'Результат: ' . ((int)$arg1 / (int)$arg2);
      } else {
        echo 'Делить на ноль нельзя!';
      }
      break;
  }
}
