jQuery(document).ready(function( $ ){
    // add to card button click
    var addToCartContainer = $('.main-content')
    if( addToCartContainer.length > 0 ) {
        addToCartContainer.on( 'click', '.add-to-cart', function(){
            var _this = $(this), postId = _this.data('postid')
            var postIds
            // sessionStorage.clear();
            if( sessionStorage.getItem("post_ids") !== null ) {
                postIds = JSON.parse( sessionStorage.getItem("post_ids") )
                sessionStorage.setItem( 'post_ids', JSON.stringify( [ ...postIds, postId ] ) );
            } else {
                sessionStorage.setItem( 'post_ids', JSON.stringify( [ postId ] ) );
            }
            $.ajax({
                url: 'http://localhost/e-commerce-website/functions.php',
                method: 'post',
                data: {
                    action: 'add_to_cart_ajax_call',
                    post_ids: postIds
                },
                beforeSend: function(){
                    // console.log( 'Before sending' )
                },
                success: function( result ){
                    console.log( result )
                    _this.parents('body').find( '.add-to-card-popover .product-list' ).append( result )
                }
            })
        })
    }
})