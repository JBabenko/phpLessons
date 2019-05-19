<?php

$products = getProducts();
$cart = getCart();

if ( isset($_GET['addtocart']) ) {

  $addItemId = $_GET['addtocart'];

  foreach ($products as $product) {
    if ($product['id'] === $addItemId) {
      $addItemName = $product['name'];
      $addItemPrice = $product['price'];
      $addItemIcon = $product['icon'];
    }
  }
  foreach ($cart as $cartItem) {
    if ($cartItem['id'] === $addItemId) {
      $existsCartItem = $cartItem;
    }
  }
  if (!$existsCartItem) {
    $addToCartQuery = sprintf(
      "INSERT INTO cart (id, name, price, icon, quantity) VALUES (\"%s\", \"%s\", \"%s\", \"%s\", 1)", $addItemId, $addItemName, $addItemPrice, $addItemIcon
    );
  } else {
    $addToCartQuery = sprintf(
      "UPDATE cart SET quantity = quantity+1 WHERE (id = \"%s\")", $addItemId
    );
  }
  
  mysqli_query(dbConnect(), $addToCartQuery);

}

if ( isset($_GET['cartremove']) ) {

  $removedItemId = $_GET['cartremove'];

  foreach ($cart as $cartItem) {
    if ($cartItem['id'] === $removedItemId) {
      if ($cartItem['quantity'] > 1) {
        $removeFromCartQuery = sprintf(
          "UPDATE cart SET quantity = quantity-1 WHERE (id = \"%s\")", $removedItemId
        );
      } else {
        $removeFromCartQuery = sprintf(
          "DELETE FROM cart WHERE (id = \"%s\")", $removedItemId
        );
      }
    }
  }

  mysqli_query(dbConnect(), $removeFromCartQuery);
}

$cart = getCart();

$cartTotal = 0;
foreach ($cart as $cartItem) {
  $cartTotal += $cartItem['price'] * $cartItem['quantity'];
}

