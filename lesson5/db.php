<?php

function sendSelectQuery($query) {
  $mysqli = mysqli_connect('localhost', 'root', '', 'geekbrains');
  $query = mysqli_query($mysqli, $query);

  $result = [];
  while ($row = mysqli_fetch_assoc($query)) {
    $result[] = $row;
  }

  mysqli_close($mysqli);
  return $result;
} 

function sendUpdateQuery($query) {
  $mysqli = mysqli_connect('localhost', 'root', '', 'geekbrains');
  $query = mysqli_query($mysqli, $query);

  mysqli_close($mysqli);
}

$url = $_SERVER['REQUEST_URI'];
