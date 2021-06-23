$(document).ready(function () {
  $(".slider-news-event")
    .not(".slick-initialized")
    .slick({
      dots: false,
      arrows: false,
      infinite: false,
      speed: 300,
      swipe: true,
      slidesToShow: 3,
      slidesToScroll: 6,
      draggable: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 3,
            dots: true,
            mobileFirst: true,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
          },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });
});
