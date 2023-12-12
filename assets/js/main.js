;(function($){
    $(document).ready(function(){ // ensure that the jQuery load after the document fully load
        $(".popup").each(function(){ //.each- loop function iterates over each of these elements
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



//class "popup", finds the  child <img> element in each "popup" element, retrieves the image's src attribute, and then sets the "popup" element's href attribute to that image URL


//$(".popup").each(function(){ ... });: This line selects all elements with the class "popup" on the page. The .each() function iterates over each of these elements, allowing you to perform actions on each one individually.

//var image = $(this).find("img").attr("src");: Within the loop, this line retrieves the src attribute of the <img> element that is a child of the current "popup" element ($(this) refers to the current "popup" element). This assumes that each "popup" element contains an <img> element.