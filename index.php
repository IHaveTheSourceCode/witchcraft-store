<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Shop</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="populate-items.js" defer></script>
    <?php include 'home-page-logic.php'; ?>
</head>
<body>
        <div id="page-main">
            <div class="top-nav">
                <div class="search-bar-wrapper">
                    <input class="header-search-input" type="search" placeholder="Search for item...">
                    <button class="search-btn">
                        <img src="images/icons/search-icon.svg" alt="search icon">
                    </button>
                </div>
                <a href="#">
                    <img src="images/icons/diagon-alley.svg" class="header-img">
                </a>    
                <div class="user-nav-wrapper">
                    <button class="header-nav-btn login-btn">
                        <img src="images/icons/wizard-icon.svg" alt="login icon" class="header-nav-icon">
                        <div class="header-nav-wrapper">
                            <p>Account</p>
                            <?php
                            if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            };
                            if(!isset($_SESSION['userID'])){
                                echo '<p>Login</p>';
                            };
                            ?>
                        </div>
                    </button>                                      
                    <button class="header-nav-btn cart-btn">
                        <img src="images/icons/shopping-cart-icon.svg" alt="cart icon" class="header-nav-icon">
                        <div class="header-nav-wrapper">
                            <p>0 items</p>
                            <p>Cart</p>
                        </div>
                    </button>
                </div>
            </div>
            <div class="header-img-center-wrapper">
                <div class="header-img-center">
                    <h1>Magical Goods for Everyday Sorcery</h2>
                    <p>Everything a witch or wizard needs, all in one place.</p>
                    <button class="shop-now-btn">Shop Now
                        <img class="shop-now-btn-image" src="images/icons/arrow-right.svg">
                    </button>
                </div>
            </div>
            <div class="bottom-nav">
                <p class="categories-label">Shop by categories</p>
                <div class="categories-carousel">
                    <button class="category-card-btn">
                        <img class="category-card-img" src="images/items_icons/wand.svg" alt="">
                        <p class="category-card-description">Wands</p>
                    </button>
                    <button class="category-card-btn">
                        <img class="category-card-img" src="images/items_icons/hoodie.svg" alt="">
                        <p class="category-card-description">Robes</p>
                    </button>
                    <button class="category-card-btn">
                        <img class="category-card-img" src="images/items_icons/spellbook.svg" alt="">
                        <p class="category-card-description">Books</p>
                    </button>
                    <button class="category-card-btn">
                        <img class="category-card-img" src="images/items_icons/cauldron.svg" alt="">
                        <p class="category-card-description">Cauldrons</p>
                    </button>
                    <button class="category-card-btn">
                        <img class="category-card-img" src="images/items_icons/pawn.svg" alt="">
                        <p class="category-card-description">Pets</p>
                    </button>
                    <button class="category-card-btn">
                        <img class="category-card-img" src="images/items_icons/broomstick.svg" alt="">
                        <p class="category-card-description">Broomsticks</p>
                    </button>
                    <button class="category-card-btn">
                        <img class="category-card-img" src="images/items_icons/sweets.svg" alt="">
                        <p class="category-card-description">Sweets</p>
                    </button>
                </div>
            </div>
            <h2 id="products-header">Products:</h2>
            <div id="home-page-products"></div>
        </div>
</body>
</html>