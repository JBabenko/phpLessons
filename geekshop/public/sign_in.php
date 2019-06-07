<?php

session_start();

require './../engine/init.php';

if ($_POST && $_POST['sign-in_login'] && $_POST['sign-in_pass']) {
  $login = $_POST['sign-in_login'];
  $inputPass = $_POST['sign-in_pass'];
}

$getUserQuery = sprintf("SELECT * FROM users WHERE login = \"%s\" LIMIT 1'", $login);
$authUser = getUser($login);

if ($authUser) {
  if (password_verify($inputPass, $authUser['password'])) {
    $_SESSION['user'] = $authUser;
  } else {
    $_SESSION['user'] = false;
  }
}

header('Location: /geekshop');