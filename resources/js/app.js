$(".dropdown-account-toggle").click(function (e) {
    $(".dropdown-menu").toggleClass("hidden");
    e.stopPropagation();
});

$(document).click(function (e) {
    if (e.target.closest(".dropdown-menu")) return;
    $(".dropdown-menu").addClass("hidden");
});
