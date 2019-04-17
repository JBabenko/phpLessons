<?php

$headerTitle = 'Geek Shop';
$pageTitle = 'The Brand';
$currentYear = getDate()['year'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?=$headerTitle?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="styles/normolize.css">
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div id="app">
        <header class="header">
            <div class="container header-wrap">
                <div class="header-left">
                    <a href="index.html" class="header-logo logo">
                        <img src="img/logo_b.png" alt="" class="header-logo-img logo-img">
                        BRAN<span class="header-logo-d logo-d">D</span>
                    </a>
                    <div class="header-form">
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
                        <search @onsearch="handleSearch">
                        </search>
                    </div>
                </div>
                <div class="header-right">
                    <div class="header-cart-wrap">
                        <img src="img/icons/cart_icon.svg" alt="" class="header-cart">
                        <cart :cart="cart" :total="cartTotal" @onchangequantity="handleChangeQuantityClick"
                            @onremoveclick="handleRemoveFromCartClick">
                        </cart>
                    </div>
                    <account-menu :user="user" @open-signup="signUpWindow = true" @open-signin="signInWindow = true"
                        @logout="logOut">
                    </account-menu>
                </div>
            </div>
        </header>
        <nav class="navigation">
            <div class="container">
                <ul class="top-menu">
                    <li class="top-menu-item">
                        <a href="index.html" class="top-menu-link">Home</a>
                        <div class="drop-menu">
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
                                </ul>
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
                                </ul>

                            </div>
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
                                </ul>
                                <div class="drop-menu-img">
                                    <a href="#" class="drop-menu-img-link">
                                        <img src="img/super_sale.jpg" alt="">
                                        <div class="drop-menu-text-wrap">
                                            <p class="drop-menu-img-text">Super<br>Sale!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="top-menu-item">
                        <a href="product.html" class="top-menu-link">Man</a>
                        <div class="drop-menu">
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
                                </ul>
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
                                </ul>

                            </div>
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
                                </ul>
                                <div class="drop-menu-img">
                                    <a href="#" class="drop-menu-img-link">
                                        <img src="img/super_sale.jpg" alt="">
                                        <div class="drop-menu-text-wrap">
                                            <p class="drop-menu-img-text">Super<br>Sale!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="top-menu-item">
                        <a href="product.html" class="top-menu-link">Women</a>
                        <div class="drop-menu">
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
                                </ul>
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
                                </ul>

                            </div>
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
                                </ul>
                                <div class="drop-menu-img">
                                    <a href="#" class="drop-menu-img-link">
                                        <img src="img/super_sale.jpg" alt="">
                                        <div class="drop-menu-text-wrap">
                                            <p class="drop-menu-img-text">Super<br>Sale!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="top-menu-item">
                        <a href="product.html" class="top-menu-link">Kids</a>
                        <div class="drop-menu">
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
                                </ul>
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
                                </ul>

                            </div>
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
                                </ul>
                                <div class="drop-menu-img">
                                    <a href="#" class="drop-menu-img-link">
                                        <img src="img/super_sale.jpg" alt="">
                                        <div class="drop-menu-text-wrap">
                                            <p class="drop-menu-img-text">Super<br>Sale!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="top-menu-item">
                        <a href="product.html" class="top-menu-link">Accoseriese</a>
                        <div class="drop-menu">
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
                                </ul>
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
                                </ul>

                            </div>
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
                                </ul>
                                <div class="drop-menu-img">
                                    <a href="#" class="drop-menu-img-link">
                                        <img src="img/super_sale.jpg" alt="">
                                        <div class="drop-menu-text-wrap">
                                            <p class="drop-menu-img-text">Super<br>Sale!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="top-menu-item">
                        <a href="product.html" class="top-menu-link">Featured</a>
                        <div class="drop-menu">
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
                                </ul>
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
                                </ul>

                            </div>
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
                                </ul>
                                <div class="drop-menu-img">
                                    <a href="#" class="drop-menu-img-link">
                                        <img src="img/super_sale.jpg" alt="">
                                        <div class="drop-menu-text-wrap">
                                            <p class="drop-menu-img-text">Super<br>Sale!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="top-menu-item">
                        <a href="product.html" class="top-menu-link">Hot Deals</a>
                        <div class="drop-menu">
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
                                </ul>
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
                                </ul>

                            </div>
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
                                </ul>
                                <div class="drop-menu-img">
                                    <a href="#" class="drop-menu-img-link">
                                        <img src="img/super_sale.jpg" alt="">
                                        <div class="drop-menu-text-wrap">
                                            <p class="drop-menu-img-text">Super<br>Sale!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="banner">
            <div class="container banner-background">
                <div class="banner-text">
                    <h1 class="banner-text-big"><?=$pageTitle?></h1>
                    <p class="banner-text-small">OF LUXERIOUS <span class="pink">FASHION</span></p>
                </div>
            </div>
        </div>
        <div class="catalog">
            <section class="container catalog-wrap">
                <div class="catalog-left">
                    <a href="product.html" class="catalog-item catalog-item-big catalog-for-men">
                        <div class="catalog-item-title">
                            <h2 class="catalog-offer">HOT DEAL</h2>
                            <p class="catalog-name"><span class="pink">FOR MEN</span></p>
                        </div>
                    </a>
                    <a href="product.html" class="catalog-item catalog-item-small catalog-accesories">
                        <div class="catalog-item-title">
                            <h2 class="catalog-offer">LUXIROUS & trendy</h2>
                            <p class="catalog-name">ACCESORIES</p>
                        </div>
                    </a>
                </div>
                <div class="catalog-right">
                    <a href="product.html" class="catalog-item catalog-item-small catalog-women">
                        <div class="catalog-item-title">
                            <h2 class="catalog-offer">30% offer</h2>
                            <p class="catalog-name">women</p>
                        </div>
                    </a>
                    <a href="product.html" class="catalog-item catalog-item-big catalog-for-kids">
                        <div class="catalog-item-title">
                            <h2 class="catalog-offer">new arrivals</h2>
                            <p class="catalog-name">FOR kids</p>
                        </div>
                    </a>
                </div>
            </section>
        </div>
        <div class="featured">
            <section class="container production-list"></section>
        </div>
        <div class="offer">
            <section class="container offer-wrap">
                <div class="offer-left">
                    <img src="img/offer_women.jpg" alt="" class="offer-img">
                    <div class="offer-title">
                        <h2 class="offer-title-big">30% <span class="pink">offer</span></h2>
                        <p class="offer-title-small">For women</p>
                    </div>
                </div>
                <div class="offer-right">
                    <article class="offer-item">
                        <img src="img/icons/delivery.svg" alt="" class="offer-item-icon">
                        <div class="offer-item-text">
                            <h3 class="offer-item-title">Free Delivery</h3>
                            <p class="offer-item-desc">Worldwide delivery on all. Authorit tively morph next-generation
                                innov
                                tion with extensive models.</p>
                        </div>
                    </article>
                    <article class="offer-item">
                        <img src="img/icons/discount.svg" alt="" class="offer-item-icon">
                        <div class="offer-item-text">
                            <h3 class="offer-item-title">Sales & discounts</h3>
                            <p class="offer-item-desc">Worldwide delivery on all. Authorit tively morph next-generation
                                innov
                                tion with extensive models.</p>
                        </div>
                    </article>
                    <article class="offer-item">
                        <img src="img/icons/quality.svg" alt="" class="offer-item-icon">
                        <div class="offer-item-text">
                            <h3 class="offer-item-title">Quality assurance</h3>
                            <p class="offer-item-desc">Worldwide delivery on all. Authorit tively morph next-generation
                                innov
                                tion with extensive models.</p>
                        </div>
                    </article>
                </div>
            </section>
        </div>
        <div class="feedback">
            <div class="feedback-back">
                <section class="container feedback-wrap">
                    <div class="feedback-left">
                        <figure class="feedback-comment">
                            <img src="img/comment_photo.png" alt="" class="feedback-comment-photo">
                            <div class="feedback-comment-right">
                                <p class="feedback-comment-text">“Vestibulum quis porttitor dui! Quisque viverra nunc
                                    mi, a
                                    pulvinar purus condimentum a. Aliquam condimentum mattis neque sed pretium”</p>
                                <p class="feedback-comment-name">Bin Burhan</p>
                                <p class="feedback-comment-city">Dhaka, Bd</p>
                                <div class="feedback-comment-switch">
                                    <div class="switch-item">
                                        <div class="switch-item-block"></div>
                                    </div>
                                    <div class="switch-item">
                                        <div class="switch-item-block"></div>
                                    </div>
                                    <div class="switch-item">
                                        <div class="switch-item-block"></div>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    </div>
                    <div class="feedback-right">
                        <div class="subscribe">
                            <h2 class="subscribe-title">Subscribe</h2>
                            <p class="sibscribe-desc">FOR OUR NEWLETTER AND PROMOTION</p>
                            <form class="subscribe-form">
                                <input type="email" placeholder="Enter Your Email" class="subscribe-form-input">
                                <input type="submit" value="Subscribe" class="subscribe-form-button">
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <footer class="footer">
            <div class="container footer-wrap">
                <div class="footer-about">
                    <a href="#" class="footer-logo logo">
                        <img src="img/logo_b.png" alt="" class="footer-logo-img logo-img">
                        BRAN<span class="footer-logo-d logo-d">D</span>
                    </a>
                    <p class="about-text">Objectively transition extensive data rather than cross functional solutions.
                        Monotonectally syndicate multidisciplinary materials before go forward benefits. Intrinsicly
                        syndicate
                        an expanded array of processes and cross-unit partnerships. <br><br>Efficiently plagiarize
                        24/365 action
                        items and focused infomediaries. Distinctively seize superior initiatives for wireless
                        technologies.
                        Dynamically optimize.</p>
                </div>
                <nav class="footer-menu-wrap"></nav>
            </div>
        </footer>
        <div class="bottom-stripe">
            <div class="container bottom-stripe-wrap">
                <p class="copyright">© <?=$currentYear?> Brand All Rights Reserved.</p>
                <div class="socials">
                    <a href="#" class="socials-item"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="socials-item"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="socials-item socials-not-exist"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="socials-item"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="socials-item"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>
        </div>

        <sign-up @close="signUpWindow = false" :isopen="signUpWindow">
        </sign-up>
        <sign-in @close="signInWindow = false" :isopen="signInWindow" @signin="signIn">
        </sign-in>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="js/main.js"></script>
</body>

</html>