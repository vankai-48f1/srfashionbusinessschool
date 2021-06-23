$(document).ready(function () {
  $(".column-half  input, .column-half  textarea")
    .on("focus blur", function (e) {
      $(this)
        .parents(".column-half ")
        .toggleClass("is-focused", e.type === "focus" || this.value.length > 0);
    })
    .trigger("blur");
});
