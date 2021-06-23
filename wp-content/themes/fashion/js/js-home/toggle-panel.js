// <!-- toggle navbar -->
$(document).ready(function () {
  $("#toggle-bar").on("click", function () {
    // $(".nav").toggleClass("nav-visible");
    $(".nav__list").toggleClass("display-nav");
    $(".toggle-bar__button").toggleClass("off");
    $(".nav").toggleClass("nav-before");
  });
});

// <!-- icon close navbar -->
$(document).ready(function () {
  if ($(window).width() < 1200) {
    $("#close-navbar").click(function () {
      $(".nav__list").removeClass("display-nav");
      $(".nav").removeClass("nav-visible");
      $(".nav").removeClass("nav-before");
    });
    const $menu = $(".nav");

    $(document).mouseup((e) => {
      if (
        !$menu.is(e.target) && // if the target of the click isn't the container...
        $menu.has(e.target).length === 0
      ) {
        // ... nor a descendant of the container
        $(".nav").removeClass("nav-visible");
        $(".nav__list").removeClass("display-nav");
        $(".nav").removeClass("nav-before");
      }
    });
  }
});
