$(document).ready(function () {

    var buttons = $('.like-btn');
    

    $( 'body' ).on('click','.like-btn', function () {

        var that = $(this);
        var ajax_url = that.data('url');
        var post_id = that.data('id');

        var bookmared_count = $('#bookmark-count').text().trim();
        var new_bookmared_count;


        if( !$(that).hasClass('selected-post') ) {

            new_bookmared_count = parseInt( bookmared_count ) + 1;
            //console.log(new_bookmared_count);
            $('#bookmark-count').text(new_bookmared_count);
            
        }



        //console.log( $(that).hasClass('selected-post') );


        $(that).addClass('selected-post');

        // ajax calling
        $.ajax({

            type : 'post',
            url : ajax_url,
        
            data : {

                action : 'like_data',
                post_ID : post_id,

            }, 
        
            success : function ( response ) {

                $('.bkm-' + post_id).slideDown('slow');

                setTimeout( function() {
                    $('.bkm-' + post_id).slideUp('slow');
                } , 1200 );

                //$(that).removeClass('selected-post');

                $("#bookmarks").append( response );
                
            },
        
        });  

    });


});