<?php
/**
 * Functions library
 * 
 * @since 1.0.0
 * @package E-commerce Website
 */

const IMAGE_PATH = 'assets/images/';
include ( 'database.php' );

if( ! function_exists( 'get_header' ) ) :
    /**
     * Get Header
     * 
     * @since 1.0.0
     */
    function get_header() {
        include ( 'header.php' );
    }
endif;

if( ! function_exists( 'get_footer' ) ) :
    /**
     * Get Footer
     * 
     * @since 1.0.0
     */
    function get_footer() {
        include ( 'footer.php' );
    }
endif;

if( ! function_exists( 'get_error_page' ) ) :
    /**
     * Get Footer
     * 
     * @since 1.0.0
     */
    function get_error_page() {
        include ( '404.php' );
    }
endif;

$test = 'Amir';

if( ! function_exists( 'add_to_cart_ajax_call' ) ) :
    /**
     * Add to cart ajax call
     * 
     * @since 1.0.0
     */
    function add_to_cart_ajax_call() {
        global $database;
        $post_ids = isset( $_POST['post_ids'] ) ? $_POST['post_ids']: '';
        $price_items = isset( $_POST['price_items'] ) ? $_POST['price_items']: '';
        session_start();
        $_SESSION['post_ids'] = $post_ids;
        $_SESSION['price_items'] = $price_items;
        if( ! empty( $database->all_posts ) && is_array( $database->all_posts ) ) :
            foreach( $database->all_posts as $product ) :
                if( $post_ids == $product['post_id'] ) :
                    ?>
                        <div class="product-item">
                            <figure>
                                <img src="<?php echo $product['featured_image']; ?>" alt="">
                            </figure>
                            <div class="post-content">
                                <h2 class="post-title"><?php echo $product['post_title']; ?></h2>
                                <span class="post-price"><?php echo '$'. $product['price'] . '.00'; ?></span>
                            </div>
                        </div>
                    <?php
                endif;
            endforeach;
        endif;
    }
endif;

// Check if the request is an AJAX request
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) === 'xmlhttprequest' ) {
    // If it's an AJAX request, check which function to call
    if( isset( $_POST['action'] ) && function_exists( $_POST['action'] ) ) {
        $action = $_POST['action'];
        echo $action();
    }
}

if( ! function_exists( 'get_products' ) ) :
    /**
     * Get products
     * 
     * @since 1.0.0
     */
    function get_products() {
        $products = [
            [
                'post_id'  =>  1,
                'title' =>  'Product 1',
                'featured_image'    =>  IMAGE_PATH . 'converse.avif',
                'price' =>  '$10.00',
                'description'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lectus vel justo ultrices imperdiet.',
                'category'  =>  []
            ],
            [
                'post_id'  =>  2,
                'title' =>  'Product 2',
                'featured_image'    =>  IMAGE_PATH . 'convser-2.jpg',
                'price' =>  '$15.00',
                'description'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lectus vel justo ultrices imperdiet.',
                'category'  =>  []
            ],
            [
                'post_id'  =>  3,
                'title' =>  'Product 3',
                'featured_image'    =>  IMAGE_PATH . 'product-3.jpg',
                'price' =>  '$20.00',
                'description'   =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et lectus vel justo ultrices imperdiet.',
                'category'  =>  []
            ]
        ];
        return $products;
    }
endif;