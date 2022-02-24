$("#toggle-nav").click(function () {
    $(".header__menu").slideToggle(400);
    if ($("#toggle-nav i").hasClass("icon-bars")) {
        $("#toggle-nav i").removeClass("icon-bars");
        $("#toggle-nav i").addClass("icon-cross");
    } else {
        $("#toggle-nav i").removeClass("icon-cross");
        $("#toggle-nav i").addClass("icon-bars");
    }
});

function windowResizeHandler() {
    if (screen.width < 768) {
        $(".header__menu").css("display", "none");
    } else if (screen.width > 767) {
        $(".header__menu").css("display", "flex");
    }
}

window.addEventListener("resize", windowResizeHandler);