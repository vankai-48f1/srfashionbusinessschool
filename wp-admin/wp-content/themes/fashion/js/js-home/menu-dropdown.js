// // drop menu
(function ($) {
  $.fn.dropdown = function () {
    var dropdown = this;
    dropdown.find(" > a").click(function () {
      var p = $(this).parent();
      $(".menu-class > li").not(p).removeClass("active");
      $(this).parent(".menu-class li").toggleClass("active");
      
    });

    $(window).click(function () {
      $(".menu-class > li").removeClass("active");
      $("nav .nav__white").removeClass("visible-white");
    });

    $(".menu-class li").click(function (event) {
      event.stopPropagation();
    });
  };
  $(".menu-class > li").dropdown();
})(jQuery);
