jQuery(document).ready(function( $ ){
    // add to card button click
    var addToCartContainer = $('.main-content')
    if( addToCartContainer.length > 0 ) {
        addToCartContainer.on( 'click', '.add-to-cart', function(){
            var _this = $(this), postId = _this.data('postid')
            $.ajax({
                url: 'http://localhost/e-commerce-website/functions.php',
                method: 'post',
                data: {
                    action: 'add_to_cart_ajax_call',
                    post_id: postId
                },
                beforeSend: function(){
                    // console.log( 'Before sending' )
                },
                success: function( result ){
                    _this.parents('body').find( '.add-to-card-popover .product-list' ).append( result )
                }
            })
        })
    }
})