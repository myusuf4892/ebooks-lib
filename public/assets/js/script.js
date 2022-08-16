/**
 * swiper slider cover
 */
const swiper = new Swiper('#swiper', {
    autoplay: {
        delay: 3000,
        disableonInteraction: false,
    },
    loop: true,

    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});

/**
 * alert pop up
 */
$(document).ready(function () {

    window.setTimeout(function() {
        $("#success-alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 2000);

});

$(document).ready(function () {

    window.setTimeout(function() {
        $("#error-alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 2000);

});
