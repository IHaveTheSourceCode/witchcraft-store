<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magic Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div id="page">
            <div class="top-nav">
                <div class="search-bar-wrapper">
                    <input type="search" placeholder="Search for item...">
                    <button class="search-btn">
                        <img src="images/icons/search-icon.svg" alt="search icon">
                    </button>
                </div>
                <img src="images/icons/diagon-alley.svg" class="header-img">
                <div class="user-nav-wrapper">
                    <button class="header-nav-btn login-btn">
                        <img src="images/icons/wizard-icon.svg" alt="login icon" class="header-nav-icon">
                        <div class="header-nav-wrapper">
                            <p>Account</p>
                            <p>Login</p>
                        </div>
                    </button>                    
                    <button class="header-nav-btn wishlist-btn">
                        <img src="images/icons/star-outline.svg" alt="" class="header-nav-icon">
                        <div class="header-nav-wrapper">
                            <p></p>
                            <p>Wishlist</p>
                        </div>
                    </button>                    
                    <button class="header-nav-btn cart-btn">
                        <img src="images/icons/shopping-cart-icon.svg" alt="cart icon" class="header-nav-icon">
                        <div class="header-nav-wrapper">
                            <p></p>
                            <p>Cart</p>
                        </div>
                    </button>
                </div>
            </div>
            <div class="bottom-nav">
                <p class="categories-label">Shop by categories</p>
                <div class="categories-carousel">
                    <div class="category-card-btn">
                        <p class="category-name"></p>
                        <img class="card-img">
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>