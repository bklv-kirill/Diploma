<x-main-layout title="Изменение пароля">

    <div class="edit-password">
        <div class="edit-password-container">
            <x-form :action="route('user.password.update')" method="POST">
                <x-password-input title="Актуальный пароль:" name="old_password" type="password" placeholder="Введите актуальный пароль" required/>
                <x-password-input title="Новый пароль:" name="new_password" type="password" placeholder="Введите новый пароль" required/>
                <x-password-input title="Подтверждение пароля:" type="password" placeholder="Поддтвердите новый пароль" required/>

                <div class="edit-password-submit-button">
                    <button type="submit">Изменить пароль</button>
                </div>
            </x-form>
        </div>
    </div>

</x-main-layout>
