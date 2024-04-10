<x-main-layout :title="'Личный кабинет'">

    <div class="profile-edit">
        <div class="profile-edit-container">
            <x-form :action="route('user.update', $user)" method="PATCH" isMultipartFormData>
                <div class="profile-avatar">
                    <div class="avatar"
                         style="background-image: url('{{ $user->avatar() }}')"></div>
                    <label class="file-input">
                        <input type="file" name="avatar">
                        <span>Выберите файл</span>
                    </label>
                    @error('avatar')
                    <div class="profile-avatar-error">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="about">
                    <h3>Обо мне:</h3>
                    <textarea name="about"
                              rows="5">{{ old('about') ?? $user->about }}</textarea>
                    @error('about')
                    <div class="about-error">
                        <span class="about-error">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="busyness">
                    <h3>Занятость:</h3>
                    <input type="checkbox" name="busyness[]" id="full_busyness">
                    <label for="full_busyness">Полная занятость</label>

                    <input type="checkbox" name="busyness[]" id="partly">
                    <label for="partly">Частичная занятость</label>

                    <input type="checkbox" name="busyness[]" id="internship">
                    <label for="internship">Стажировка</label>
                </div>
                <div class="chart">
                    <h3>Занятость:</h3>
                    <input type="checkbox" name="chart[]" id="full_day">
                    <label for="full_day">Полный день</label>

                    <input type="checkbox" name="chart[]" id="replaceable">
                    <label for="replaceable">Сменный график</label>

                    <input type="checkbox" name="chart[]" id="flexible">
                    <label for="flexible">Гибкий график</label>

                    <input type="checkbox" name="chart[]" id="remotely">
                    <label for="remotely">Удаленная работа</label>

                    <input type="checkbox" name="chart[]" id="watch">
                    <label for="watch">Вахтовый метод</label>
                </div>
                <button class="profile-update" type="submit">Обновить</button>
            </x-form>
        </div>
    </div>

</x-main-layout>
