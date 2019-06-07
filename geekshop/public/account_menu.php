<?php

if ($_GET['userexit']) {
  unset($_SESSION['user']);
}

if (isset($_SESSION['user'])) {
  $activeUser = getUser($_SESSION['user']['login']);
} else {
  $activeUser = false;
}