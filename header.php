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
    <?php session_start(); ?>
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
            <div class="product-list">
                <?php
                    if( ! empty( $_SESSION['post_ids'] ) && is_array( $_SESSION['post_ids'] ) ) :
                        $database = new Database\DatabaseInfo();
                        foreach( $_SESSION['post_ids'] as $post ) :
                            foreach( $database->get_products() as $database_product ) :
                                if( $database_product['post_id'] == $post ) :
                                    ?>
                                        <div class="product-item">
                                            <figure>
                                                <img src="<?php echo $database_product['featured_image']; ?>" alt="">
                                            </figure>   
                                            <div class="post-content">
                                                <h2 class="post-title"><?php echo $database_product['post_title']; ?></h2>
                                                <span class="post-price"><?php echo '$'. $database_product['price'] . '.00'; ?></span>
                                            </div>
                                        </div>
                                    <?php
                                endif;
                            endforeach;
                        endforeach;
                    endif;
                ?>
            </div>
            <div class="product-total">
                <span class="total-label">Total</span>
                <span class="total-price">
                    <?php
                    $total_amount;
                        if( ! empty( $_SESSION['price_items'] ) && is_array( $_SESSION['price_items'] ) ) :
                            $total_amount = array_sum( $_SESSION['price_items'] );
                            echo $total_amount;
                        else:
                            $total_amount = 'NULL';
                            echo $total_amount;
                        endif;
                    ?>
                </span>
            </div>
            <div class="checkout-button">
            <form action="https://uat.esewa.com.np/epay/main" method="POST">
                <input value="<?php echo $total_amount; ?>" name="tAmt" type="hidden">
                <input value="<?php echo $total_amount; ?>" name="amt" type="hidden">
                <input value="0" name="txAmt" type="hidden">
                <input value="0" name="psc" type="hidden">
                <input value="0" name="pdc" type="hidden">
                <input value="EPAYTEST" name="scd" type="hidden">
                <input value="<?php echo rand( 1, 100000 ); ?>" name="pid" type="hidden">
                <input value="http://localhost/e-commerce-website?esewa_success=1" type="hidden" name="su">
                <input value="http://localhost/e-commerce-website?esewa_failure=0" type="hidden" name="fu">
                <input value="Checkout" type="submit">
            </form>
            </div>
        </div>
    </header>