<?php

require './../engine/init.php';

if ($_POST && $_POST['sign-up_name'] && $_POST['sign-up_login'] && $_POST['sign-up_pass']) {
  $name = $_POST['sign-up_name'];
  $login = $_POST['sign-up_login'];
  $inputPass = $_POST['sign-up_pass'];
}

$pass = password_hash($inputPass, PASSWORD_DEFAULT);

$signUpQuery = sprintf(
  "INSERT INTO users (name, login, password) VALUES (\"%s\", \"%s\", \"%s\")", $name, $login, $pass
);


mysqli_query(dbConnect(), $signUpQuery);

session_start();
$_SESSION['user'] = $login;

header('Location: /geekshop');