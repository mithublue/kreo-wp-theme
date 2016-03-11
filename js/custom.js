;(function($){
    $(document).ready(function(){

        var nav_links = JSON.parse( js_data.nav_links );

        if(typeof nav_links == "object") {
            $('.main_nav li a').each(function(){
                $(this).attr( 'href', js_data.home_url + '#' + nav_links[$(this).text()] );
            }).addClass('smoothscroll').click(function(){
                if( !js_data.is_home_url ) {
                    window.location = $(this).attr('href');
                }
            });
        }

    });

    var partials = {};
    $('.kreo_partial').each(function(){
        partials[ $(this).attr('id') ] = $(this).attr('id');
    });

    //contact form
    $( '#contact-form #contactForm').submit( function() {
        var form_data = $(this).serialize();
        $.post(
            js_data.ajaxurl,
            {
                action : 'kreo_send_mail'
            }
        )
    });

}(jQuery));