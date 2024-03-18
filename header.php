<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopSwiftly</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/external/fontawesome/css/all.css">
</head>
<body>
    <header>
        <h1 class="site-branding"><a href="index.php">ShopSwiftly</a></h1>
        <div class="menu-wrap">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="page.php">Products</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <button class="add-to-cart-button" popovertarget="add-to-card-popover"><i class="fa-solid fa-cart-shopping"></i></button>
            </div>
        </div>
        <div class="add-to-card-popover" id="add-to-card-popover" popover>
            <div class="product-list"></div>
            <div class="product-total">
                <span class="total-label">Total</span>
                <span class="total-price">$100.00</span>
            </div>
            <div class="checkout-button">
                <button>Checkout</button>
            </div>
        </div>
    </header>