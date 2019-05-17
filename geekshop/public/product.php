<?php

$getProductsQuery = mysqli_query(dbConnect(), "SELECT * FROM products");

$products = [];

while ($row = mysqli_fetch_assoc($getProductsQuery)) {
    $products[] = $row;
}
