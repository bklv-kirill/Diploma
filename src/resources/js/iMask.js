import $ from 'jquery';
import IMask from 'imask';

$(document).ready(function () {
    let phoneInput = $('.profile-edit .profile-edit-container form .phone input');
    if (phoneInput.length > 0) {
        IMask(phoneInput[0], {
            mask: '+{7}-(000)-000-00-00'
        });
    }

    let birthdayInput = $('.profile-edit .profile-edit-container form .birthday input');
    if (birthdayInput.length > 0) {
        IMask(birthdayInput[0], {
            mask: Date,
            min: new Date(1924, 0, 1),
            max: new Date(9999, 0, 1),
            autofix: true,
            overwrite: false,
        })
    }
});



