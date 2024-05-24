import $ from 'jquery';
import Accordion from 'accordion-js';

$(document).ready(function () {
    const currentAuthUserIdInput = $('#currentAuthUserId');
    const currentAuthUserId = currentAuthUserIdInput.length !== 0 ?
        currentAuthUserIdInput[0].value :
        null;

    const searchForm = $('.filter form');
    searchForm.on('change', function () {
        $('.show-more a').detach();
    });

    const searchButton = searchForm.find('.search-button button');
    const list = $('.list');

    const requestUrl = '/api/' + $('.filter-container').parent().attr('class');

    const sortButtons = $('.sort-button');

    const loaderHtml = `
        <div class="list-loader">
            <div class="sk-grid">
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
                <div class="sk-grid-cube"></div>
            </div>
        </div>`;
    const showMoreHtml = `
         <div class="show-more">
            <a href="#">Показать еще...</a>
        </div>`;

    searchButton.on('click', searchButtonCallback);
    sortButtons.on('click', sortButtonsCallback);
    searchButton.click();

    function removeSortingOrderTypeClasses() {
        sortButtons.removeClass('desc');
        sortButtons.removeClass('asc');
        sortButtons.data('type', '');
    }

    function switchSortingOrderTypeClass(orderType, button) {
        if (orderType === 'asc') {
            button.removeClass('desc');
            button.addClass('asc');
        } else {
            button.removeClass('asc');
            button.addClass('desc');
        }
    }

    function searchButtonCallback(event) {
        event.preventDefault();

        sortButtons.data('order-type', '');

        const searchData = getSearchData();

        removeSortingOrderTypeClasses();

        mobileScroll();

        sendMainAjaxRequest(searchData);
    }

    function showMoreCallback(event) {
        event.preventDefault();

        disableSearchAndSortControls();

        const listShowMoreContainer = $(this).parent();

        let searchData = getSearchData();
        searchData.nextPage = $(this).data('next-page');

        searchData.orderColumn = sortButtons.data('order-column') ?? null;
        searchData.orderType = sortButtons.data('order-type') ?? null;

        $.ajax({
            url: requestUrl,
            method: 'GET',
            dataType: 'json',
            data: searchData,
            beforeSend: () => {
                listShowMoreContainer.html(loaderHtml);
            },
        }).then((response) => {
            $('.list .show-more').detach();

            list.append(response.html);

            enableSearchAndSortControls();

            if (response.currentPage !== response.lastPage) {
                addShowMoreCallBack(response);
            }

            addResponseButtonCallback();

            enableVacancyAccordionContainer();
        }).fail((error) => {
            window.location.reload();
        });
    }

    function getSearchData() {
        const searchFormData = new FormData(searchForm[0]);
        return {
            'searchTitle': getFormData('search_title', searchFormData),
            'searchDescription': getFormData('search_description', searchFormData),
            'cityId': getFormData('city_id', searchFormData),
            'ageFrom': getFormData('age_from', searchFormData),
            'ageTo': getFormData('age_to', searchFormData),
            'employments': getFormData('employments', searchFormData, true),
            'charts': getFormData('charts', searchFormData, true),
            'softs': getFormData('softs', searchFormData, true),
            'hards': getFormData('hards', searchFormData, true),
            'education': getFormData('education', searchFormData, true),
            'salaryFrom': getFormData('salary_from', searchFormData),
            'salaryTo': getFormData('salary_to', searchFormData),
            'currentAuthUserId': currentAuthUserId,
        };
    }

    function sortButtonsCallback() {
        removeSortingOrderTypeClasses();

        let orderType = $(this).data('order-type');
        orderType = orderType === 'desc' ? 'asc' : 'desc';

        $(this).data('order-type', orderType);

        switchSortingOrderTypeClass(orderType, $(this));

        const searchData = getSearchData();
        searchData.order = { 'orderColumn': $(this).data('order-column'), 'orderType': orderType };

        mobileScroll();

        sendMainAjaxRequest(searchData);
    }

    function addShowMoreCallBack(response) {
        list.append(showMoreHtml);

        const showMore = $('.show-more a');
        showMore.data('next-page', response.currentPage + 1);
        showMore.on('click', showMoreCallback);
    }

    function sendMainAjaxRequest(searchData) {
        $.ajax({
            url: requestUrl,
            method: 'GET',
            dataType: 'json',
            data: searchData,
            beforeSend: () => {
                list.html('');

                disableSearchAndSortControls();

                list.append(loaderHtml);
            },
        }).then((response) => {
            enableSearchAndSortControls();

            list.html(response.html);

            if (response.currentPage !== response.lastPage) {
                addShowMoreCallBack(response);
            }

            addResponseButtonCallback();

            enableVacancyAccordionContainer();
        }).fail((error) => {
            window.location.reload();
        });
    }

    function disableSearchAndSortControls() {
        sortButtons.addClass('submit');
        sortButtons.off('click');

        searchButton.addClass('submit');
        searchButton.off('click');
        searchButton.on('click', function (event) {
            event.preventDefault();
        });
    }

    function enableSearchAndSortControls() {
        searchButton.removeClass('submit');
        sortButtons.removeClass('submit');

        searchButton.on('click', searchButtonCallback);
        sortButtons.on('click', sortButtonsCallback);
    }

    function mobileScroll() {
        if ($(window).width() <= 750) {
            $([document.documentElement, document.body]).animate({
                scrollTop: list.offset().top,
            }, 2200);
        }
    }

    function addResponseButtonCallback() {
        const responseButtons = $('.response-button');

        if (responseButtons.length !== 0) {
            responseButtons.off('click');

            responseButtons.each(function () {
                if ($(this).hasClass('owned')) {
                    $(this).html('Ваша вакансия');
                    return;
                }
                if (!$(this).hasClass('responded')) {
                    $(this).on('click', responseButtonRespondCallback);
                } else {
                    $(this).html('Вы откликнулсь');
                    $(this).on('click', responseButtonRejectCallback);
                }
            });
        }
    }

    function responseButtonRespondCallback() {
        const vacancyId = $(this).data('vacancy-id');

        $.ajax({
            url: '/api/responses/store',
            method: 'POST',
            dataType: 'json',
            data: {
                'currentAuthUserId': currentAuthUserId,
                'vacancyId': vacancyId,
            },
            beforeSend: () => {
                $(this).off('click');

                $(this).addClass('respond-process');
            },
        }).then((response) => {
            $(this).html('Вы откликнулсь');

            $(this).removeClass('respond-process');
            $(this).addClass('responded');

            $(this).on('click', responseButtonRejectCallback);
        });
    }

    function enableVacancyAccordionContainer() {
        const vacancyAccordionContainer = $('.vacancy-accordion-container');

        if (vacancyAccordionContainer.length !== 0) {
            vacancyAccordionContainer.each(function (vacancyAccordionContainerKey, vacancyAccordionContainer) {
                const vacancyAccordion = new Accordion(vacancyAccordionContainer, {
                    showMultiple: true,
                });
            });
        }
    }

    function responseButtonRejectCallback() {
        const vacancyId = $(this).data('vacancy-id');

        $.ajax({
            url: '/api/responses/delete',
            method: 'DELETE',
            dataType: 'json',
            data: {
                'currentAuthUserId': currentAuthUserId,
                'vacancyId': vacancyId,
            },
            beforeSend: () => {
                $(this).off('click');

                $(this).removeClass('responded');
                $(this).addClass('reject-process');
            },
        }).then((response) => {
            $(this).html('Откликнуться');

            $(this).removeClass('reject-process');
            $(this).removeClass('responded');

            $(this).on('click', responseButtonRespondCallback);
        });
    }

    function getFormData(key, formData, isArray = false) {
        let data = isArray ? formData.getAll(key + '[]') : formData.get(key);

        return (data === null || data.length) ? data : null;
    }
});
