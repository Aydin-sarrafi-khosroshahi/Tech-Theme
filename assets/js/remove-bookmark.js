$(document).ready(function () {

    var buttons = $('.remove-fav-btn');

    $( buttons ).click( function () {

        var that = $(this);
        var ajax_url = that.data('url');
        var post_id = that.data('id');



        // ajax calling
        $.ajax({

            type : 'post',
            url : ajax_url,
        
            data : {

                action : 'remove_data',
                post_ID : post_id,

            }, 
        
            success : function ( response ) {

                var clicked_box = that.parents( '.post-boxes' );
                clicked_box.removeClass('reveal');

                //alert($('#bookmarks').text().trim());
                setTimeout(() => {
                    
                    clicked_box.remove();
                    var exsit_btn_count = $('body').find('.remove-fav-btn'); 
                    $('#bookmark-count').text(exsit_btn_count.length);


                    if( $('#bookmarks').text().trim() == '' ) {

                        $('#bookmarks').append('شما هیچ پست مورد علاقه ندارید .');

                    }


                }, 500 );
                

                // var bookmared_count = $('#bookmark-count').text().trim();
                // var new_bookmared_count;


                // var exsit_bookmarked = [];
        
                // exsit_bookmarked.push( $('body').find('.remove-fav-btn') );    
                // console.log(exsit_bookmarked.length);
                
            },
        
        });  

    });


});