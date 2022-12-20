$(document).ready(function () {

    revealPosts();

    $("#sidebar-toggeler").click(function(){
        $("#sidebar-box").show('slow');
    });

    $("#close-sb-btn").click(function(){
        $("#sidebar-box").hide('slow');
    });




    // load more posts 
    var Load_more_btn = $('#load-more');
    Load_more_btn.on( 'click' , function(){
    
        var that = $(this);
        var Page = that.data('page');
        var NewPage = Page + 1;
        var ajax_url = that.data('url');
    
        that.addClass('loading');
        that.find('#LM-text').hide(400);
        that.find('#LM-icon').addClass('spin');
    
        // ajax calling
        $.ajax({

            type : 'post',
            url : ajax_url,

            data : {
                action:'get_data',
                page: Page,
            }, 

            success : function ( response ) { 

                setTimeout( function(){

                    that.data('page' , NewPage);
                    $("#post-box").append( response );
                    
                    // $(".like-btn").click(function(){
                        
                    //     var that = $(this);
                    //     var ajax_url = that.data('url');
                    //     var post_id = that.data('id');
                
                
                    //     $(that).addClass('selected-post');
                
                    //     // ajax calling
                    //     $.ajax({
                
                    //         type : 'post',
                    //         url : ajax_url,
                        
                    //         data : {
                
                    //             action : 'like_data',
                    //             post_ID : post_id,
                
                    //         }, 
                        
                    //         success : function ( response ) {
                
                    //             $('.bkm-' + post_id).slideDown('slow');
                
                    //             setTimeout( function() {
                    //                 $('.bkm-' + post_id).slideUp('slow');
                    //             } , 1200 );
                
                    //             $("#bookmarks").append( response );
                                
                    //         },
                        
                    //     });  

                    // });


                    that.find('#LM-text').show(400);
                    that.find('#LM-icon').removeClass('spin');
                    that.removeClass('loading');

                    revealPosts();


                } , 1000);

            },
            
        });  
    });

    //animate the loaded posts   
    function revealPosts() {

        var posts = $('.post-boxes:not(.reveal)');
        var i = 0;
    
        setInterval(function() {

            if( i >= posts.length ) return false;
            var element = posts[i];
            $(element).addClass('reveal');
    
            i++;

        } , 200);       
    };




});


