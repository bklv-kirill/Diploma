import $ from 'jquery';

$(document).ready(function () {
    $('.profile-edit .profile-edit-container form .profile-avatar .file-input input[type=file]').on('change', function () {
        const files = this.files;
        const avatar = files[0];

        let name = avatar.name;
        let extension = name.split('.').pop().toLowerCase();
        name = name.length <= 15 ? name : name.substring(0, 12) + '...';

        $(this).next().html(name);

        const avatarContainer = $('.profile-edit .profile-edit-container form .profile-avatar .avatar');

        if (!['png', 'jpg', 'jpeg'].includes(extension)) return

        if (FileReader && avatar && files.length) {
            var fileReader = new FileReader();
            fileReader.onload = function () {
                avatarContainer.css({"background-image": "url(" + fileReader.result + ")"});
                avatarContainer.attr('data-src', fileReader.result);
            }
            fileReader.readAsDataURL(avatar);
        }
    });
});

