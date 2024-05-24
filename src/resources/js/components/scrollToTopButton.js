import $ from 'jquery';

$(document).ready(function () {
    const scrollToTopButton = $('.scroll-to-top-button');

    if (scrollToTopButton.length !== 0) {
        scrollToTopButton.on('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    $(window).scroll(function () {
        if ($(this).scrollTop() >= 250) {
            scrollToTopButton.removeClass('hidden');
        } else {
            scrollToTopButton.addClass('hidden');
        }
    });
});
