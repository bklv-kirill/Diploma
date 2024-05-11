import $ from 'jquery';

$(document).ready(function () {
    const applicantsSearchForm = $('.applicants-filter form');
    applicantsSearchForm.on('change', function () {
        $('.applicants-show-more a').detach();
    })

    const applicantsSearchButton = applicantsSearchForm.find('.applicants-search-button button');
    const applicantsList = $('.applicants-list');

    const applicantsListLoaderHtml = `
        <div class="applicants-list-loader">
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
    const applicantsListShowMoreHtml = `
         <div class="applicants-show-more">
            <a href="#">Показать еще...</a>
        </div>`;

    applicantsSearchButton.on('click', applicantsSearchButtonCallback);
    applicantsSearchButton.click();

    function applicantsSearchButtonCallback(event) {
        event.preventDefault();

        const applicantsSearchData = getApplicantsSearchData();

        $.ajax({
            url: '/api/applicants',
            method: 'GET',
            dataType: 'json',
            data: applicantsSearchData,
            beforeSend: () => {
                applicantsList.html('');

                $(this).addClass('submit');
                $(this).off('click');
                $(this).on('click', function (event) {
                    event.preventDefault();
                });

                applicantsList.append(applicantsListLoaderHtml);
            },
        }).then((response) => {
            $(this).removeClass('submit');

            $(this).on('click', applicantsSearchButtonCallback);

            applicantsList.html(response.html);

            if (response.currentPage !== response.lastPage)
                addApplicantsListShowMoreCallBack(response);
        }).fail((error) => {
            // window.location.reload();
        });
    }

    function applicantsShowMoreCallback(event) {
        event.preventDefault();

        const applicantsListShowMoreContainer = $(this).parent();

        let applicantsSearchData = getApplicantsSearchData();
        applicantsSearchData.nextPage = $(this).data('next-page');

        $.ajax({
            url: '/api/applicants',
            method: 'GET',
            dataType: 'json',
            data: applicantsSearchData,
            beforeSend: () => {
                applicantsListShowMoreContainer.html(applicantsListLoaderHtml)
            },
        }).then((response) => {
            $('.applicants-list .applicants-show-more').detach();

            applicantsList.append(response.html);

            if (response.currentPage !== response.lastPage)
                addApplicantsListShowMoreCallBack(response);
        }).fail((error) => {
            // window.location.reload();
        });
    }

    function getApplicantsSearchData() {
        const applicantsSearchFormData = new FormData(applicantsSearchForm[0]);
        return {
            'cityId': getFormData('city_id', applicantsSearchFormData),
            'ageFrom': getFormData('age_from', applicantsSearchFormData),
            'ageTo': getFormData('age_to', applicantsSearchFormData),
            'employments': getFormData('employments', applicantsSearchFormData, true),
            'charts': getFormData('charts', applicantsSearchFormData, true),
            'softs': getFormData('softs', applicantsSearchFormData, true),
            'hards': getFormData('hards', applicantsSearchFormData, true),
            'education': getFormData('education', applicantsSearchFormData, true),
            'salaryFrom': getFormData('salary_from', applicantsSearchFormData),
            'salaryTo': getFormData('salary_to', applicantsSearchFormData),
            'currentAuthUserId': getFormData('current_auth_user_id', applicantsSearchFormData),
        };
    }

    function addApplicantsListShowMoreCallBack(response) {
        applicantsList.append(applicantsListShowMoreHtml);

        const applicantsListShowMore = $('.applicants-show-more a');
        applicantsListShowMore.data('next-page', response.currentPage + 1)
        applicantsListShowMore.on('click', applicantsShowMoreCallback);
    }

    function getFormData(key, formData, isArray = false) {
        let data = isArray ? formData.getAll(key + '[]') : formData.get(key);

        return (data === null || data.length) ? data : null;
    }
});
