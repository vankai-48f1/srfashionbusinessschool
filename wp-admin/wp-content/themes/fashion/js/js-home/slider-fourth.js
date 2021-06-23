(function($) {
  $(document).ready(function () {
    $(".slider-stories")
      .not(".slick-initialized")
      .slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        centerMode: false,
        arrows: false,
        infinite: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: false,
              dots: true,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: false,
            },
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ],
      });
  });
  
})(jQuery)
