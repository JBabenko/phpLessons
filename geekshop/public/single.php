<?php

$singleProductQuery = mysqli_query(dbConnect(), sprintf(
  "SELECT * FROM products WHERE id = \"%s\"", $_GET['id']
));

$single = [];

while ($row = mysqli_fetch_assoc($singleProductQuery)) {
    $single[] = $row;
}
