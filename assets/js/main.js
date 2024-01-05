;(function($){
    $(document).ready(function(){ 
        $(".popup").each(function(){ 
            var image = $(this).find("img").attr("src");
            $(this).attr("href", image);
        });

        //tns-js
        var slider = tns({
            container: '.slider',
            speed: 300,
            autoplayTimeout: 3000,
            autoHeight: false,
            controls: true,
            nav: false,
            autoplayButtonOutput: false,
            items: 1,
            // slideBy: 'page',
            autoplay: true
        });

    });
}(jQuery))