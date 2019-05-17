<?php

require './../engine/init.php';

if ($_POST && $_POST['name'] && $_POST['text']) {
  $name = $_POST['name'];
  $text = $_POST['text'];
}

$date = date("Y-m-d H:i:s");

$addReviewQuery = sprintf(
  "INSERT INTO comments (name, date, text) VALUES (\"%s\", \"%s\", \"%s\")", $name, $date, $text
);

mysqli_query(dbConnect(), $addReviewQuery);

header('Location: /geekshop');