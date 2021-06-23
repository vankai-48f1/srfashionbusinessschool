// slider primary
(function($) {
  $(document).ready(function () {
    $("#slider-primary")
      .not(".slick-initialized")
      .slick({
        dots: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 1,
        zIndex: 1,
        slidesToScroll: 1,
        swipeToSlide: true,
        touchThreshold: 3,
        autoplay: true,
        accessibility: true,
        cssEase: "cubic-bezier(1,.01,.61,.69)",
        // easing: "ease-in-out",
        waitForAnimate: true,
        autoplaySpeed: 3000,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: true,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });
  });
})(jQuery)

