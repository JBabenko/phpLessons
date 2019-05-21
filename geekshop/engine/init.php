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

function getUsers() {
  $getUsersQuery = mysqli_query(dbConnect(), "SELECT * FROM users");
  $users = [];
  while ($row = mysqli_fetch_assoc($getUsersQuery)) {
      $users[] = $row;
  }
  return $users;
}

function getUser($login) {

  $query_auth = sprintf('SELECT * FROM users WHERE login = "%s" LIMIT 1', $login);
  $mysql_auth = mysqli_query(dbConnect(), $query_auth);

  $user = NULL;

  while ($row = mysqli_fetch_assoc($mysql_auth)) {
    $user[] = $row;
  }

   if (!is_null($user))
    return $user[0];
    return false;
}