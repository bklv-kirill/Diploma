<x-main-layout :title="'Личный кабинет'">

    <div class="profile-edit">
        <div class="profile-edit-container">
            <x-form :action="route('user.update', $user)" method="PATCH" isMultipartFormData>
                <div class="profile-avatar">
                    <div class="avatar" style="background-image: url('{{ asset('/images/default.jpg') }}')"></div>
                    <label class="file-input">
                        <input type="file" name="avatar">
                        <span>Выберите файл</span>
                    </label>
                </div>
                <div class="about">
                    <h3>Обо мне:</h3>
                    <textarea name="about" rows="5">{{ $user->about }}</textarea>
                </div>
                <button class="profile-update" type="submit">Обновить</button>
            </x-form>
        </div>
    </div>

</x-main-layout>
