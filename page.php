<?php 
    require 'functions.php';
    get_header();
    ?>
        <main>
            <section>
                <h2>Products</h2>
                <?php
                    if( ! empty( $database->all_posts ) && is_array( $database->all_posts ) ) :
                        foreach( $database->all_posts as $product ) :
                        ?>
                            <div class="product">
                                <img src="<?php echo $product['featured_image']; ?>" alt="Product 2">
                                <h2 class="post-title"><?php echo $product['post_title']; ?></h2>
                                <span class="post-price"><?php echo '$'. $product['price'] . '.00'; ?></span>
                                <a href="single.php?post_id=<?php echo $product['post_id'];?>">View Details</a>
                            </div>
                        <?php  
                        endforeach;
                    endif;
                ?>
            </section>
        </main>
    <?php
    get_footer();
?>