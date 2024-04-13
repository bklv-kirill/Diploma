import $ from 'jquery';

$(document).ready(function () {
    $('.nav-bar .toggle').click(function () {
        $(this).toggleClass('scaled');
        $('.navigation').toggleClass('open');
        $('.controls').toggleClass('open');
    });
});
