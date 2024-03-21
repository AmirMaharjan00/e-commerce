jQuery(document).ready(function( $ ){
    // add to card button click
    var addToCartContainer = $('.main-content')
    if( addToCartContainer.length > 0 ) {
        addToCartContainer.on( 'click', '.add-to-cart', function(){
            var _this = $(this), postId = _this.data('postid'), price = _this.data('price')
            // _this.parents('.page').siblings('header').find('.product-total .total-price').text( price )
            var postIds, prices

            // for posts
            if( sessionStorage.getItem("post_ids") !== null ) {
                postIds = JSON.parse( sessionStorage.getItem("post_ids") )
                var toSend = $.inArray( postId, postIds );
                if( toSend === -1 ) sessionStorage.setItem( 'post_ids', JSON.stringify( [ ...postIds, postId ] ) );
            } else {
                sessionStorage.setItem( 'post_ids', JSON.stringify( [ postId ] ) );
            }

            // for price
            if( sessionStorage.getItem("price_items") !== null ) {
                prices = JSON.parse( sessionStorage.getItem("price_items") )
                var priceToSend = $.inArray( price, prices );
                if( priceToSend === -1 ) sessionStorage.setItem( 'price_items', JSON.stringify( [ ...prices, price ] ) );
            } else {
                sessionStorage.setItem( 'price_items', JSON.stringify( [ price ] ) );
            }

            $.map( prices, function( value ) { return $.isNumeric( value ) ? parseFloat( value ) : 0; }).reduce( function( a, b ) { return a + b; }, 0);
            $.ajax({
                url: 'http://localhost/e-commerce-website/functions.php',
                method: 'post',
                data: {
                    action: 'add_to_cart_ajax_call',
                    post_ids: postIds,
                    price_items: prices
                },
                success: function( result ){
                    _this.parents('body').find( '.add-to-card-popover .product-list' ).append( result )
                }
            })
        })
    }
})