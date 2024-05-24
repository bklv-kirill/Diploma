import $ from 'jquery';
import Accordion from 'accordion-js';
import 'accordion-js/dist/accordion.min.css';

$(document).ready(function () {
    const faqAccordionContainer = $('.faq-accordion-container');

    if (faqAccordionContainer.length !== 0) {
        new Accordion(faqAccordionContainer[0], {
            showMultiple: true,
        });
    }

    const mainAccordionContainer = $('.main-accordion-container');

    if (mainAccordionContainer.length !== 0) {
        const mainAccordion = new Accordion(mainAccordionContainer[0], {
            showMultiple: true,
        });
        mainAccordion.openAll();
    }
});
