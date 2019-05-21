<?php

if ($_GET['userexit']) {
  unset($_SESSION['user']);
}

if (isset($_SESSION['user'])) {
  $users = getUsers();
  foreach ($users as $user) {
    if ($user['login'] === $_SESSION['user']) {
      $activeUser = $user;
    }
  }
}