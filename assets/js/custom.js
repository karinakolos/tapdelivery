/*if ($("body").hasClass("logged-in")) {
    $(".signin-btn").attr("href", "/my-account");
    $(".register-btn").css("cursor", "no-drop");
    $(".register-btn").css("color", "#d6d6d6");
} else {
    $(".signin-btn").removeAttr("href");
    $(".signin-btn").click(function () {
        $("body").addClass("modal_opened signin");
    });
    $(".register-btn").click(function () {
        $("body").addClass("modal_opened register");
    });
}

function goToURL() {
    location.href = '/my-account';

  }

$(".woocommerce-form-login__submit").click(function(){
    location.replace("/my-account");
    return false;
});
*/

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
        $("wpcf7-form-control[aria-required='true']").each(function () {
            let val = $("wpcf7-form-control[aria-required='true']").val();
            console.log(val);
            if (val == "") {
                $(".check-text").text("Перепроверьте, пожалуйста, все ли данные вы ввели.");
            }
        });
        let bool = $(".check-text").text();
        if (bool == "") {
            $(".check-text").text("Перепроверьте, пожалуйста, все ли данные введены корректно.");
        }
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