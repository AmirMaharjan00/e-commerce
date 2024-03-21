<?php
    require 'functions.php';
    get_header();
?>  
    <main>
        <section>
            <h2>Welcome to Our Store!</h2>
            <p>Explore our wide range of products.</p>
        </section>

        <section id="featured-products">
            <h2>Featured Products</h2>
            <?php
                // add_to_cart_ajax_call();
                if( ! empty( $database->all_posts ) && is_array( $database->all_posts ) ) :
                    echo '<div class="products-wrap">';
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
                    echo '</div>';
                endif;
            ?>
            <!-- Add more products here -->
        </section>

        <section id="testimonials">
            <h2>Testimonials</h2>
            <div class="testimonial">
                <blockquote>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lectus vel justo ultrices imperdiet."
                </blockquote>
                <p class="author">John Doe</p>
            </div>
            <div class="testimonial">
                <blockquote>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lectus vel justo ultrices imperdiet."
                </blockquote>
                <p class="author">Jane Smith</p>
            </div>
            <!-- Add more testimonials here -->
        </section>

        <section id="about-us">
            <div class="container">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit velit nec ex vehicula, vel dignissim purus malesuada. Vivamus eget condimentum nunc. Nulla commodo magna vitae ultricies bibendum. Ut eget tortor quis magna cursus tempus. Integer scelerisque erat ut urna consequat bibendum. Morbi nec libero a eros molestie aliquam. Duis nec tellus nec ipsum sollicitudin facilisis eget ac mauris. Proin consequat libero sit amet nibh condimentum varius.</p>
                <p>Sed eget turpis a mauris blandit placerat in ac nulla. Ut tristique lacus id convallis aliquam. Morbi lacinia nulla at ligula finibus, at vehicula sem fringilla. Nam ullamcorper pretium eros vel rhoncus. Fusce aliquet velit vel justo accumsan convallis. Ut pretium nisi vel augue condimentum pharetra. Sed vestibulum ante in lectus sollicitudin tincidunt.</p>
            </div>
        </section>
        
        
    </main>
<?php
    get_footer();
?>
