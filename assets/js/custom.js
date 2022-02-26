if ($("body").hasClass("logged-in")) {
    $(".signin-btn").attr("href", "/my-account");
    $(".register-btn").css("cursor", "no-drop");
    $(".register-btn").css("color", "#d6d6d6");
} else {
    $(".signin-btn").removeAttr("href");
}

$("input[placeholder='Email'").attr("placeholder", "E-mail")
$("input[placeholder='First Name'").attr("placeholder", "Имя")
$("input[placeholder='Last Name'").attr("placeholder", "Фамилия")
$("input[placeholder='Password'").attr("placeholder", "Пароль")
$("input[placeholder='Confirm Password'").attr("placeholder", "Подтвердите пароль")
$('.xoo-aff-checkbox_single').prop('checked', true);

$(".wpcf7-submit").click(function () {
    if ($(this).hasClass("check")) {
        $(".check-text").text("");
        $(".form-block").css("margin-top", "0");
        $(".check-text").css("padding", "0");
        $(".check-text").css("border", "0");
    } else {
        $(this).addClass("check");
        $(".check-text").text("Перепроверьте, пожалуйста, все ли данные введены корректно.");
        $(".check-text").css("border", "1px solid #fe4747");
        $(".check-text").css("padding", "0.5rem");
        $(window).scrollTop(0);
        $(".form-block").css("margin-top", "2rem");
        return false;
    }
});

$(".modal__close").click(function () {
    $("body").removeClass("modal_opened signin register");
})

$(".custom-overlay").click(function () {
    $("body").removeClass("modal_opened signin register");
})

$(".social-fixed").click(function () {
    $(".social-block").addClass("social-block_opened");
    $(this).addClass("social-fixed_hidden");
})

$(".social-block__close").click(function () {
    $(".social-block").removeClass("social-block_opened");
    $(".social-fixed").removeClass("social-fixed_hidden");
})

//ACCORDIONS

$(".faq__title").click(function () {
    let item_id = $(this).attr("item_id");
    let target_class = '.faq__item[item_id="' + item_id + '"]';
    if ($(target_class).hasClass("faq__item_active")) {
        $(target_class).removeClass("faq__item_active");
    } else {
        if ($(".faq__item").hasClass("faq__item_active")) {
            $(".faq__item").removeClass("faq__item_active");
        }
        $(target_class).addClass("faq__item_active");
    }
})

// smooth scrollin

$('a[href^="#"').on('click', function() {

    let href = $(this).attr('href');

    $('html, body').animate({
        scrollTop: $(href).offset().top
    });
    return false;
});

$("#toggle-nav").click(function () {
    if ($(".header__menu").hasClass("header__menu_opened")) {
        $(".header__menu").removeClass("header__menu_opened");
        $(".custom-overlay").removeClass("custom-overlay_opened");
        $("body").css("overflow-y", "auto");
        $("#toggle-nav i").css("color", "#000");
    } else {
        $(".header__menu").addClass("header__menu_opened");
        $(".custom-overlay").addClass("custom-overlay_opened");
        $("body").css("overflow-y", "hidden");
        $("#toggle-nav i").css("color", "#F5F6FA");
    }
    if ($("#toggle-nav i").hasClass("icon-bars")) {
        $("#toggle-nav i").removeClass("icon-bars");
        $("#toggle-nav i").addClass("icon-cross");
    } else {
        $("#toggle-nav i").removeClass("icon-cross");
        $("#toggle-nav i").addClass("icon-bars");
    }
});

$(".dropdown-toggle").click(function () {
    $(".dropdown").slideToggle(400);
    if ($(this).parent().hasClass("dropdown_opened")) {
        $(this).parent().removeClass("dropdown_opened");
    } else {
        $(this).parent().addClass("dropdown_opened");
    }
});