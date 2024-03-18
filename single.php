<?php
    require 'functions.php';
    get_header();

    if( empty( $_GET ) || $_GET['post_id'] > count( $database->all_posts ) ) get_error_page();
    if( ! empty( $database->all_posts ) && is_array( $database->all_posts ) && ! empty( $_GET ) ) :
        foreach( $database->all_posts as $product ) :
            if( $_GET['post_id'] == $product['post_id']  ) :
                ?>
                    <div class="page">
                        <main>
                            <section class="main-content">
                                <h2>Product Details</h2>
                                <div class="product-details">
                                    <img src="<?php echo $product['featured_image']; ?>" alt="Product 2">
                                    <h2 class="post-title"><?php echo $product['post_title']; ?></h2>
                                    <span class="post-price"><?php echo '$'. $product['price'] . '.00'; ?></span>
                                    <button class="add-to-cart" data-postId="<?php echo $product['post_id']; ?>">Add to cart</button>
                                </div>
                            </section>
                        </main>
                    </div>
                <?php
            endif;
        endforeach;
    endif;

    get_footer();
?>
