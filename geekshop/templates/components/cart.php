<div class="drop-cart">

  <?php if (!empty($cart)) : ?>

  <div class="drop-cart-goods">

    <?php foreach ($cart as $item) : ?>

    <div class="item-in-cart">
      <a href="single.html?id=<?= $item['id'] ?>" class="drop-cart-link">
        <img src="<?= $item['icon'] ?>" alt="<?= $item['name'] ?>" class="drop-cart-img">
      </a>
      <div class="drop-cart-desc">
        <a href="single.html?id=<?= $item['id'] ?>" class="drop-cart-itemname drop-cart-link"><?= $item['name'] ?></a>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <div class="drop-cart-price">
          <span class="cart-quantity"><?= $item['quantity'] ?></span> x
          <span class="cart-price">$<?= $item['price'] ?></span>
        </div>
      </div>
      <a href="<?= $pageAddr ?>?cartremove=<?= $item['id'] ?>">
        <i class="fas fa-times-circle cart-remove"></i>
      </a>
    </div>

    <?php endforeach ?>

  </div>
  <div class="drop-cart-total">
    <span>total</span>
    <span>$<?= $cartTotal ?>.00</span>
  </div>
  <div class="drop-cart-buttons">
    <a href="checkout.html" class="drop-cart-checkout drop-cart-button">Checkout</a>
    <a href="shopping-cart.html" class="drop-cart-gotocart drop-cart-button">Go to cart</a>
  </div>

  

  <?php else : ?>

  <div>Корзина пуста</div>

  <?php endif ?>

</div>