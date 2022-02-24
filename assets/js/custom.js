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
    } else {
        $(this).addClass("check");
        $(".check-text").text("Перепроверьте, пожалуйста, все ли данные введены корректно.");
        $(window).scrollTop(0);
        $(".form-block").css("margin-top", "2rem");
        return false;
    }
});

/*$(".wpcf7").submit(function(event, i) {
    if ($(".wpcf7-submit").hasClass("check")) {
        $(".check-text").text("");
        $(".form-block").css("margin-top", "0");
    } else {
        $(".wpcf7-submit").addClass("check");
        $(".check-text").text("Перепроверьте, пожалуйста, все ли данные введены корректно.");
        $(window).scrollTop(0);
        $(".form-block").css("margin-top", "2rem");
    }
})*/

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