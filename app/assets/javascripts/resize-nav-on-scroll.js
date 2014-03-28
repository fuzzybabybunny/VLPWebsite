$(window).scroll(function () {
    if ($(document).scrollTop() == 0) {
        $('#top-nav').removeClass('tiny');
    } else {
        $('#top-nav').addClass('tiny');
    }
});
