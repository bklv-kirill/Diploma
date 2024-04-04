import $ from 'jquery';

$(document).ready(function () {
    $('.toggle').click(function () {
        $(this).toggleClass('scaled');
        $('.navigation').toggleClass('open');
        $('.controls').toggleClass('open');
    });
});
