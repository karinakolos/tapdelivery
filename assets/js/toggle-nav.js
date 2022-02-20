$("#toggle-nav").click(function () {
    $("#navbar-header").slideToggle(400);
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
        $("#navbar-header").css("display", "none");
    } else if (screen.width > 767) {
        $("#navbar-header").css("display", "flex");
    }
}

window.addEventListener("resize", windowResizeHandler);