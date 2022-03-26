(function($) {
    "use strict";
    jQuery(document).on('ready', function() {
        $(window).load(function() { 
            $("#loading").fadeOut(1200); 
            $("#chat-raise").addClass('animi');
        });
        $(document).on("scroll", function() { if ($(document).scrollTop() > 150) { $(".main-nav").addClass("black"); } else { $(".main-nav").removeClass("black"); } });
        $(document).on("scroll", function() { if ($(document).scrollTop() > 0) { $(".mobile-nav").addClass("black"); } else { $(".mobile-nav").removeClass("black"); } });
        $(window).on("scroll", function() { if ($(this).scrollTop() > 300) { $('.scroll-top').fadeIn(); } else { $('.scroll-top').fadeOut(); } });
        $('.scroll-top').click(function() { $('html, body').animate({ scrollTop: 0 }, 800); return false; });
        jQuery('.mean-menu').meanmenu({ meanScreenWidth: "991" });
        new WOW({ offset: 100, mobile: true }).init();
        $(".video-pop").magnificPopup({ disableOn: 320, type: 'iframe', removalDelay: 160, preloader: false, fixedContentPos: false });
        $('.home-course-slider').owlCarousel({ loop: true, margin: 20, dots: false, autoplay: true, nav: true, navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-next'></i>"], autoplayHoverPause: true, responsive: { 0: { items: 1, }, 576: { items: 2, }, 768: { items: 2, }, 1000: { items: 3, }, 1300: { items: 4, } } });
        $('.course-slider').owlCarousel({ loop: true, margin: 20, dots: false, autoplay: false, nav: true, navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-next'></i>"], autoplayHoverPause: true, responsive: { 0: { items: 2, }, 576: { items: 4, }, 768: { items: 4, }, 1000: { items: 4, }, 1300: { items: 6, } } });
        $(".home-slider").owlCarousel({ animateOut: 'slideOutDown', animateIn: 'slideInDown', items: 1, loop: true, autoplay: false, dots: false, nav: true, navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-next'></i>"], autoHeight: true, autoplaySpeed: 800, mouseDrag: false, autoplayHoverPause: true, responsive: { 0: { items: 1, }, 576: { items: 1, }, 768: { items: 1, }, 1200: { items: 1, } } });
        $('.event-slider').owlCarousel({ loop: true, margin: 20, dots: false, autoplay: false, dots: false, autoplayHoverPause: true, mouseDrag: false, navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-next'></i>"], responsive: { 0: { items: 1, }, 576: { items: 1, }, 768: { items: 1, }, 1200: { items: 1, } } });
        $('.news-slider').owlCarousel({ loop: true, margin: 20, dots: false, autoplay: false, dots: false, autoplayHoverPause: true, mouseDrag: false, navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-next'></i>"], responsive: { 0: { items: 1, }, 576: { items: 1, }, 768: { items: 1, }, 1200: { items: 1, } } });
        $('.teacher-slider').owlCarousel({ loop: true, margin: 20, dots: false, autoplay: false, dots: false, autoplayHoverPause: true, mouseDrag: false, navText: ["<i class='flaticon-left-arrow'></i>", "<i class='flaticon-next'></i>"], responsive: { 0: { items: 1, }, 576: { items: 1, }, 768: { items: 1, }, 1200: { items: 1, } } });
        $('.image-pop').magnificPopup({ type: 'image', removalDelay: 300, gallery: { enabled: true }, });
        $('.accordion').find('.accordion-title').on('click', function() {
            $(this).toggleClass('active');
            $(this).next().slideToggle('fast');
            $('.accordion-content').not($(this).next()).slideUp('fast');
            $('.accordion-title').not($(this)).removeClass('active');
        });

        function makeTimer() {
            var endTime = new Date("April 30, 2021 17:00:00 PDT");
            var endTime = (Date.parse(endTime)) / 1000;
            var now = new Date();
            var now = (Date.parse(now) / 1000);
            var timeLeft = endTime - now;
            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
            if (hours < "10") { hours = "0" + hours; }
            if (minutes < "10") { minutes = "0" + minutes; }
            if (seconds < "10") { seconds = "0" + seconds; }
            $("#days").html(days + "");
            $("#hours").html(hours + "");
            $("#minutes").html(minutes + "");
            $("#seconds").html(seconds + "");
        }
        setInterval(function() { makeTimer(); }, 1000);
        $('.gall-list').isotope({ itemSelector: '.item' });
        $('.all-gall li').click(function() {
            $('.all-gall li').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $('.gall-list').isotope({ filter: selector });
            return false;
        });
    });


    $(document).ready(function(){
        

        $("#chat-raise").click(function() {    
            $("#chat-raise").toggle('scale');
            $(".chatbox").toggle('scale');
          })
          
        $("#chat-close").click(function() {
            console.log("close click")
        $("#chat-raise").removeClass('animi');
        $("#chat-raise").toggle('scale');
        $(".chatbox").toggle('scale');
        })


        $("#feedback-tab").click(function() {
            $("#feedback-form").toggle("slide");
        });
        
    });
}(jQuery));