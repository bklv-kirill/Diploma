import $ from 'jquery';
import Accordion from 'accordion-js';
import 'accordion-js/dist/accordion.min.css';

$(document).ready(function () {
    const accordionContainer = $('.accordion-container');

    if (accordionContainer.length !== 0) {
        new Accordion(accordionContainer[0], {
            showMultiple: true,
        });
    }
})

