import $ from 'jquery';
import select2 from 'select2';
import 'select2/dist/css/select2.min.css'

$(document).ready(function () {
    select2();

    $.fn.select2.amd.define('select2/i18n/ru', [], function () {
        return {
            errorLoading: function () {
                return 'Результат не может быть загружен.';
            },
            inputTooLong: function (value) {
                const overChars = value.input.length - value.maximum;
                let message = 'Пожалуйста, удалите ' + overChars + ' символ';
                if (overChars >= 2 && overChars <= 4) {
                    message += 'а';
                } else if (overChars >= 5) {
                    message += 'ов';
                }
                return message;
            },
            inputTooShort: function (value) {
                const remainingChars = value.minimum - value.input.length;

                return 'Пожалуйста, введите ' + remainingChars + ' или более символов';
            },
            loadingMore: function () {
                return 'Загружаем ещё ресурсы…';
            },
            maximumSelected: function (value) {
                let message = 'Вы можете выбрать ' + value.maximum + ' элемент';

                if (value.maximum >= 2 && value.maximum <= 4) {
                    message += 'а';
                } else if (value.maximum >= 5) {
                    message += 'ов';
                }

                return message;
            },
            noResults: function () {
                return 'Ничего не найдено';
            },
            searching: function () {
                return 'Поиск…';
            }
        };
    });

    $('.city-select select').select2({
        language: 'ru',
        width: '100%',
        ajax: {
            url: "/api/cities",
            data: function (options) {
                return {
                    q: options.term,
                    page: options.page
                };
            },
            dataType: 'json',
            delay: 250,
            processResults: function (response, options) {
                const data = response.data;
                options.page = response.meta.current_page || 1;

                data.forEach(function (city) {
                    city.text = city.name
                })

                return {
                    results: data,
                    pagination: {
                        more: (options.page * 20) < response.meta.total
                    }
                };
            },
        },
    });

    $('.profile-edit .profile-edit-container form .education .university-select select').select2({
        language: 'ru',
        width: '100%',
        ajax: {
            url: "/api/universities",
            data: function (options) {
                return {
                    q: options.term,
                    page: options.page
                };
            },
            dataType: 'json',
            delay: 250,
            processResults: function (response, options) {
                const data = response.data;
                options.page = response.meta.current_page || 1;

                data.forEach(function (university) {
                    university.text = university.name
                })

                return {
                    results: data,
                    pagination: {
                        more: (options.page * 20) < response.meta.total
                    }
                };
            },
        },
    });

    $('.profile-edit .profile-edit-container form .education .collage-select select').select2({
        language: 'ru',
        width: '100%',
        ajax: {
            url: "/api/collages",
            data: function (options) {
                return {
                    q: options.term,
                    page: options.page
                };
            },
            dataType: 'json',
            delay: 250,
            processResults: function (response, options) {
                const data = response.data;
                options.page = response.meta.current_page || 1;

                data.forEach(function (collage) {
                    collage.text = collage.name
                })

                return {
                    results: data,
                    pagination: {
                        more: (options.page * 20) < response.meta.total
                    }
                };
            },
        },
    });

    $('.softs select').select2({
        language: 'ru',
        width: '100%',
        ajax: {
            url: "/api/softs",
            data: function (options) {
                return {
                    q: options.term,
                    page: options.page
                };
            },
            dataType: 'json',
            delay: 250,
            processResults: function (response, options) {
                const data = response.data;
                options.page = response.meta.current_page || 1;

                data.forEach(function (soft) {
                    soft.text = soft.name
                })

                return {
                    results: data,
                    pagination: {
                        more: (options.page * 20) < response.meta.total
                    }
                };
            },
        },
    });

    $('.hards select').select2({
        language: 'ru',
        width: '100%',
        ajax: {
            url: "/api/hards",
            data: function (options) {
                return {
                    q: options.term,
                    page: options.page
                };
            },
            dataType: 'json',
            delay: 250,
            processResults: function (response, options) {
                const data = response.data;
                options.page = response.meta.current_page || 1;

                data.forEach(function (hard) {
                    hard.text = hard.name
                })

                return {
                    results: data,
                    pagination: {
                        more: (options.page * 20) < response.meta.total
                    }
                };
            },
        },
    });
});
