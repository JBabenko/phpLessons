<?php

define('ROOT_DIR', __DIR__.'/../');
$pageAddr = $_SERVER['PHP_SELF'];

function dbConnect() {

  $defaultConfig = require ROOT_DIR.'config/config.default.php';

  if (!file_exists(ROOT_DIR.'config/config.php')) {
    echo 'Создайте файл конфигурации';
    $localConfig = [];
  } else {
    $localConfig = require ROOT_DIR.'config/config.php';
  }

  $config = array_merge($defaultConfig, $localConfig);

  $mysqli = mysqli_connect(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
  );

  return $mysqli;
}

function getProducts($query = "SELECT * FROM products") {
  $getProductsQuery = mysqli_query(dbConnect(), $query);
  $products = [];
  while ($row = mysqli_fetch_assoc($getProductsQuery)) {
      $products[] = $row;
  }
  return $products;
}

function getUsers($query = "SELECT * FROM users") {
  $getUsersQuery = mysqli_query(dbConnect(), $query);
  $users = [];
  while ($row = mysqli_fetch_assoc($getUsersQuery)) {
      $users[] = $row;
  }
  return $users;
}