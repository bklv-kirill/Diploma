import $ from 'jquery';

$(document).ready(function () {
    $('.profile-edit .profile-edit-container form .profile-avatar .file-input input[type=file]').on('change', function () {
        let file = this.files[0];
        let fileName = file.name;
        let resultFileName = fileName.length <= 15 ? fileName : fileName.substring(0, 12) + '...';

        $(this).next().html(resultFileName);
    });
});

