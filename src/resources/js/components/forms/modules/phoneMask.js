import $ from 'jquery';
import IMask from 'imask';

$(document).ready(function () {
    let phoneInput = $('.profile-edit .profile-edit-container form .phone input');
    if (phoneInput.length > 0) {
        IMask(phoneInput[0], {
            mask: '+{7}-(000)-000-00-00'
        });
    }
});



