import './modal/hystmodal.min.css';
import './modal/hystmodal.min.js';

import $ from 'jquery';

$(document).ready(function () {

    const loadingSpinner = new HystModal({
        linkAttributeName: "data-loading-spinner",
        closeOnOverlay: false,
        closeOnEsc: false,
        closeOnButton: false,
    });

    const deleteAccountConfirmation = new HystModal({
        linkAttributeName: "data-delete-account",
    });

    let deleteButton = $('.profile-edit .profile-edit-container form .controls .profile-delete');
    if (deleteButton.length > 0) {
        deleteButton.on('click', function (event) {
            event.preventDefault();
        });
    }
});
