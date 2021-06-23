(function ($) {
    $(document).ready(function () {
        $("#slider-secondary")
            .not(".slick-initialized")
            .slick({
                centerMode: true,
                centerPadding: "180px",
                slidesToShow: 1,
                speed: 300,
                slidesToScroll: 1,
                dots: false,
                cssEase: "ease-in-out",
                easing: "ease-in-out",
                cssEase: "ease-in-out",
                arrows: true,
                prevArrow: '<button class="slick-prev">Preview &emsp;<i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button class="slick-next">Next &emsp;<i class="fas fa-chevron-right"></i></button>',
                //   customPaging: function (slider, i) {
                //     var title = $(slider.$slides[i]).find("[data-title]").data("title");
                //     return '<a class="pager__item"> ' + title + " </a>";
                //   },
                swipeToSlide: true,
                infinite: false,
                touchThreshold: 4,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: "80px",
                            slidesToShow: 1,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            centerPadding: "40px",
                            slidesToShow: 1,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: "40px",
                            slidesToShow: 1,
                        },
                    },
                ],
            });
    
    });
})(jQuery)