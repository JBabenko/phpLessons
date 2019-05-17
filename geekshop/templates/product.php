<?php 
  require ROOT_DIR.'public/reviews.php';
?>

<div class="production-catalog">
    <div class="container production-catalog-wrap">
        <nav class="production-catalog-left">
            <ul class="production-menu">
                <li>
                    <div class="production-menu-item pink">
                        <span class="production-menu-item-text">Category</span>
                        <span class="production-menu-item-arrow">▼</span>
                    </div>
                    <ul class="product-submenu">
                        <li><a href="#" class="product-submenu-item">Accessories</a></li>
                        <li><a href="#" class="product-submenu-item">Bags</a></li>
                        <li><a href="#" class="product-submenu-item">Denim</a></li>
                        <li><a href="#" class="product-submenu-item">Hoodies & Sweatshirts</a></li>
                        <li><a href="#" class="product-submenu-item">Jackets & Coats</a></li>
                        <li><a href="#" class="product-submenu-item">Pants</a></li>
                        <li><a href="#" class="product-submenu-item">Polos</a></li>
                        <li><a href="#" class="product-submenu-item">Shirts</a></li>
                        <li><a href="#" class="product-submenu-item">Shoes</a></li>
                        <li><a href="#" class="product-submenu-item">Shorts</a></li>
                        <li><a href="#" class="product-submenu-item">Sweaters & Knits</a></li>
                        <li><a href="#" class="product-submenu-item">T-Shirts</a></li>
                        <li><a href="#" class="product-submenu-item">Tanks</a></li>
                    </ul>
                </li>
                <li>
                    <div class="production-menu-item">
                        <span class="production-menu-item-text">Brand</span>
                        <span class="production-menu-item-arrow">▼</span>
                    </div>
                </li>
                <li>
                    <div class="production-menu-item">
                        <span class="production-menu-item-text">Designer</span>
                        <span class="production-menu-item-arrow">▼</span>
                    </div>
                </li>

            </ul>
        </nav>
        <div class="production-catalog-right">
            <div class="production-filter">
                <div class="production-filter-top">
                    <div class="production-filter-trending production-filter-item">
                        <h2 class="production-filter-title">Trending now</h2>
                        <ul class="production-filter-trending-list">
                            <li class="production-filter-trending-item">Bohemian<span>   |   </span></li>
                            <li class="production-filter-trending-item">Floral<span>   |   </span></li>
                            <li class="production-filter-trending-item">Lace<span>   |   </span></li>
                            <li class="production-filter-trending-item">Floral<span>   |   </span></li>
                            <li class="production-filter-trending-item">Lace<span>   |   </span></li>
                            <li class="production-filter-trending-item">Bohemian</li>
                        </ul>
                    </div>
                    <div class="production-filter-size production-filter-item">
                        <h2 class="production-filter-title">Size</h2>
                        <div class="production-filter-size-wrap">
                            <input type="checkbox" name="xxs" id="size-xxs">
                            <label class="production-filter-size-item" for="size-xxs">XXS</label>
                            <input type="checkbox" name="xs" id="size-xs">
                            <label class="production-filter-size-item" for="size-xs">XS</label>
                            <input type="checkbox" name="s" id="size-s">
                            <label class="production-filter-size-item" for="size-s">S</label>
                            <input type="checkbox" name="m" id="size-m">
                            <label class="production-filter-size-item" for="size-m">M</label>
                            <input type="checkbox" name="l" id="size-l">
                            <label class="production-filter-size-item" for="size-l">L</label>
                            <input type="checkbox" name="xl" id="size-xl">
                            <label class="production-filter-size-item" for="size-xl">XL</label>
                            <input type="checkbox" name="xxl" id="size-xxl">
                            <label class="production-filter-size-item" for="size-xxl">XXL</label>
                        </div>
                    </div>
                    <div class="production-filter-price production-filter-item">
                        <h2 class="production-filter-title">Price</h2>
                        <div class="range">
                            <div class="range-checked">
                                <div class="range-min range-controller"></div>
                                <div class="range-max range-controller"></div>
                            </div>
                        </div>
                        <div class="filter-checked-price">
                            <p class="filter-checked-price-min">$52</p>
                            <p class="filter-checked-price-max">$400</p>
                        </div>
                    </div>
                </div>
                <div class="production-filter-bottom">
                    <div class="production-sort production-sortby">
                        <div class="production-sort-name">Sort By</div>
                        <div class="production-sort-details">Name<span>▼</span></div>
                    </div>
                    <div class="production-sort production-sortby">
                        <div class="production-sort-name">Show</div>
                        <div class="production-sort-details">09<span>▼</span></div>
                    </div>
                </div>
            </div>
            <main class="production-list">

              <?php foreach($products as $item) : ?>

                <div class="production-item">
                    <a href="./single.php?id=<?= $item['id'] ?>" class="production-item-link">
                        <img src="<?= $item['icon'] ?>" alt="" class="production-item-img">
                        <div class="production-item-text">
                            <p class="production-item-title"><?= $item['name'] ?></p>
                            <p class="production-item-price">$<?= $item['price'] ?></p>
                        </div>
                    </a>
                    <div class="production-item-addtocart">
                        <a href="" class="production-addtocart-link">
                            <img src="img/icons/cart_white.svg" alt="" class="production-cart-icon">
                            <span class="production-addtocart-text">Add to Cart</span>
                        </a>
                    </div>
                </div>

                <?php endforeach ?>

            </main>
            <div class="production-list-pages">
                <ul class="pages-list">
                    <li class="left-arrow"><a href="#"><i class="fas fa-angle-left"></i></a></li>
                    <li class="pages-list-item"><a class="pink" href="#">1</a></li>
                    <li class="pages-list-item"><a href="#">2</a></li>
                    <li class="pages-list-item"><a href="#">3</a></li>
                    <li class="pages-list-item"><a href="#">4</a></li>
                    <li class="pages-list-item"><a href="#">5</a></li>
                    <li class="pages-list-item"><a href="#">6</a></li>
                    <li class="pages-list-item pages-list-points ">.....</li>
                    <li class="pages-list-item"><a href="#">20</a></li>
                    <li class="right-arrow"><a href="#"><i class="fas fa-angle-right"></i></a></li>
                </ul>
                <a href="#" class="production-view-all">View All</a>
            </div>
        </div>
    </div>
</div>

<?php require 'components/reviews.php' ?>