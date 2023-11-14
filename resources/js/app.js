$(".dropdown-account-toggle").click(function (e) {
    $(".dropdown-menu").toggleClass("hidden");
    e.stopPropagation();
});

$(document).click(function (e) {
    if (e.target.closest(".dropdown-menu")) return;
    $(".dropdown-menu").addClass("hidden");
});

$(".dropdown-toggle").click(function () {
    $(this).nextAll(".dropdown-menu-link:first").toggleClass("hidden");
    $(this).children(".dropdown-arrow").toggleClass("rotate-180");
    $(".dropdown-toggle").toggleClass("active-hover");
});
