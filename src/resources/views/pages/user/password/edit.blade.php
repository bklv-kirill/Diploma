<x-main-layout :title="'Изменение пароля'">

    <div class="edit-password">
        <div class="edit-password-container">
            <x-form :action="route('user.password.update')" method="POST">
                <div class="edit-password-input">
                    <h3>Актуальный пароль:</h3>
                    @error('old_password')
                    <span>{{ $message }}</span>
                    @enderror
                    <input type="text" name="old_password" placeholder="Введите актуальный пароль">
                </div>
                <div class="edit-password-input">
                    <h3>Новый пароль:</h3>
                    @error('new_password')
                    <span>{{ $message }}</span>
                    @enderror
                    <input type="text" name="new_password" placeholder="Введите новый пароль">
                </div>
                <div class="edit-password-input">
                    <h3>Подтверждение пароля:</h3>
                    <input type="text" name="new_password_confirmation" placeholder="Поддтвердите новый пароль">
                </div>
                <div class="edit-password-submit-button">
                    <button type="submit">Изменить пароль</button>
                </div>
            </x-form>
        </div>
    </div>

</x-main-layout>
