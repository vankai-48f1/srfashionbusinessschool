// function sticky_menu(menu, sticky) {
//   if (typeof sticky === "undefined" || !jQuery.isNumeric(sticky)) sticky = 0;
//   if ($(window).scrollTop() >= sticky) {
//     $(".stiky-ss").addClass("remove-fixed");
//   } else {
//     $(".stiky-ss").removeClass("remove-fixed");
//   }
// }

// $(document).ready(function () {
//   var menu = $("#sticky-bar");
//   var sticky = menu.offset().top;
//   console.log(sticky);
//   if ($(window).width() > 767) {
//     sticky_menu(menu, sticky);
//     $(window).on("scroll", function () {
//       sticky_menu(menu, sticky);
//     });
//   }
// });
