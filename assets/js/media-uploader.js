$(document).ready(function(){
    
    var upload_img_btn = document.getElementById("upload_img_btn");
    var uploaded_img_src = document.getElementById("uploaded_img_src");
    //var remove_profile_img_btn = document.getElementById("profile_remove_img_btn");

    var cats_img_uploader;
    cats_img_uploader = wp.media({
        title : 'Select the profile image',
        button : {
            text : 'use this image'
        },
        multiple : false
    });

    upload_img_btn.addEventListener( 'click' , function(){
        if(cats_img_uploader) {
            cats_img_uploader.open();
        }
    });

    cats_img_uploader.on( 'select' , function(){
        var attachment = cats_img_uploader.state().get('selection').first().toJSON();
        var src = attachment.url;
        var cut_src = src.split("wordpress/");
        document.getElementById('cats-img').setAttribute( 'src' , "http://localhost/wordpress/"+cut_src[1]);
        uploaded_img_src.setAttribute( 'value' , cut_src[1])
        // $('#cats-img-box').append('<input id="uploaded_img_src" name="uploaded_img_src" type="text" hidden value="'+ cut_src[1] +'"/>');
        // $('#cats-img-box').find('#cats-img').attr('src').val(''+ cut_src[1] +'');
    });

    // remove_profile_img_btn.addEventListener( 'click' , function() {
    //     var answer = confirm("are sure that you wana remove profile image ?!");

    //     if( answer == true ) {
    //         image_src.value = '';
    //         var general_form = document.querySelector(".post-detal-general-form");
    //         general_form.submit();
    //     }
    // });


});