import $ from 'jquery';
import './modal/hystmodal.min.css';
import './modal/hystmodal.min.js';

$(document).ready(function () {

    const loadingSpinner = new HystModal({
        linkAttributeName: 'data-loading-spinner',
        closeOnOverlay: false,
        closeOnEsc: false,
        closeOnButton: false,
    });

    const deleteAccountConfirmation = new HystModal({
        linkAttributeName: 'data-delete-account',
    });
    const phoneEnter = new HystModal({
        linkAttributeName: 'data-phone-enter',
    });
    const birthdayEnter = new HystModal({
        linkAttributeName: 'data-birthday-enter',
    });

    let deleteButton = $('.profile-edit .profile-edit-container form .controls .profile-delete');
    if (deleteButton.length > 0) {
        deleteButton.on('click', function (event) {
            event.preventDefault();
        });
    }
});
