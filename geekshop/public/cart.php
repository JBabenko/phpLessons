<?php

$products = getProducts();

if ( isset($_GET['addtocart']) ) {

  $addItemId = $_GET['addtocart'];

  foreach ($products as $product) {
    if ($product['id'] === $addItemId) {
      $addedItem = $product;
    }
  }

  if (isset($_SESSION['cart'])) {
    
    foreach ($_SESSION['cart'] as &$cartItem) {
      if ( $cartItem['id'] === $addedItem['id'] ) {
        $cartItem['quantity']++;
        $existingItem = $cartItem;
      }
    }
    
    if (!$existingItem) {
      $addedItem['quantity'] = 1;
      $_SESSION['cart'][] = $addedItem;
    }
  }
}  

if ( isset($_GET['cartremove']) ) {

  $removedItemId = $_GET['cartremove'];

  foreach ($products as $product) {
    if ($product['id'] === $removedItemId) {
      $removedItem = $product;
    }
  }

  if (isset($_SESSION['cart'])) {
    $itemIndex = 0;
    foreach ($_SESSION['cart'] as &$cartItem) {
      if ( $cartItem['id'] === $removedItem['id'] ) {
        if ($cartItem['quantity'] > 1) {
          $cartItem['quantity']--;
        } else {
          unset($_SESSION['cart'][$itemIndex]);
          sort($_SESSION['cart']);
        }
      }
      $itemIndex++;
    }
  }
}  

$cart = $_SESSION['cart'];

$cartTotal = 0;
foreach ($cart as $item) {
  $cartTotal += $item['price'] * $item['quantity'];
}