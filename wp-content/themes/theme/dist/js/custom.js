jQuery(document).ready(function () {
  jQuery(".header-user").on("click", function (e) {
    e.preventDefault();
    jQuery(".drop-user").toggleClass("open");
  });
  jQuery(document).click(function (e) {
    var user = jQuery(".header-user, .drop-user");
    if (!user.is(e.target) && user.has(e.target).length === 0) {
      user.removeClass("open");
    }
  });
  jQuery(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 200) {
      jQuery(".header-desktop").addClass("sticky");
    } else {
      jQuery(".header-desktop").removeClass("sticky");
    }
  });
});
jQuery(document).ready(function ($) {
  AOS.init();
});
