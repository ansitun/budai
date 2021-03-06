jQuery(document).ready(function($){
    
    $( "#search" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "search",
                data: {term: request.term, },
                dataType: "json",
                success: function(data) {
                    var a = [];
                    for ( var i in data  ) {
                        if ( 'undefined' !== typeof data[i].name ) {
                            a.push(data[i]);
                        }
                    }
                    
                    console.log(a);
                    response($.map(a, function (item) {
                            return {
                                value: item.name,
                                sku: item.sku
                            };
                        }));
                }
            });
        },
        select: function(event, ui) {
                   var ele = $("#bing");
                   var homeLink = ele.attr("href");
                   ele.attr("href",(homeLink + "productDetail?sku=" + ui.item.sku));
                   
                   return;
                }
    });
    
    // jQuery sticky Menu
    
	$(".mainmenu-area").sticky({topSpacing:0});
    
    
    $('.product-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });  
    
    $('.related-products-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:2,
            },
            1200:{
                items:3,
            }
        }
    });  
    
    $('.brand-list').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    });    
    
    
    // Bootstrap Mobile Menu fix
    $(".navbar-nav li a").click(function(){
        $(".navbar-collapse").removeClass('in');
    });    
    
    // jQuery Scroll effect
    $('.navbar-nav li a, .scroll-to-up').bind('click', function(event) {
        var $anchor = $(this);
        var headerH = $('.header-area').outerHeight();
        $('html, body').stop().animate({
            scrollTop : $($anchor.attr('href')).offset().top - headerH + "px"
        }, 1200, 'easeInOutExpo');

        event.preventDefault();
    });    
    
    // Bootstrap ScrollPSY
    $('body').scrollspy({ 
        target: '.navbar-collapse',
        offset: 95
    })      
});

