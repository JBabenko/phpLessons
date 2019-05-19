<?php 
    require ROOT_DIR.'public/cart.php' 
?>

<body>
    <div id="app">
        <header class="header">
            <div class="container header-wrap">
                <div class="header-left">
                    <a href="index.html" class="header-logo logo">
                        <img src="img/logo_b.png" alt="" class="header-logo-img logo-img">
                        BRAN<span class="header-logo-d logo-d">D</span>
                    </a>
                    <form class="header-form">
                        <div class="header-form-browse">
                            Browse <span class="header-form-arrow">▼</span>
                            <div class="browse-menu">
                                <div class="drop-item">
                                    <h3 class="drop-menu-title">Women</h3>
                                    <ul class="drop-menu-list">
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Dresses</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Tops</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Sweaters/Knits</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Jackets/Coats</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Blazers</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Denim</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Leggings/Pants</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Skirts/Shorts</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Accessories</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="drop-item">
                                    <h3 class="drop-menu-title">Men</h3>
                                    <ul class="drop-menu-list">
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Sweaters/Knits</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Jackets/Coats</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Blazers</a>
                                        </li>
                                        <li class="drop-menu-list-item">
                                            <a href="product.html" class="drop-menu-list-link">Denim</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="header-form-input" placeholder="Search for Item...">
                        <button class="header-form-button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="header-right">
                    <div class="header-cart-wrap">
                        <img src="img/icons/cart_icon.svg" alt="" class="header-cart">
                        
                        <?php require 'cart.php' ?>

                    </div>
                    <a href="#" class="button header-account-button">My Account <span
                            class="header-account-arrow">▼</span></a>
                </div>
            </div>
        </header>