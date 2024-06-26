<x-main-layout title="Личный кабинет">

    <div class="profile-edit">
        <div class="profile-edit-container">
            <x-form :action="route('user.update', $user)" method="PATCH" isMultipartFormData>
                <div class="profile-avatar">
                    <x-user-avatar :avatar="$user->avatar()" :fullUserName="$user->fullName()"/>
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
                              rows="5" placeholder="Расскажите о себе...">{{ old('about') ?? $user->about }}</textarea>
                    @error('about')
                    <div class="about-error">
                        <span class="about-error">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                @emailVerified
                @if(!$user->phone)
                    <div class="phone">
                        <h3>Номер телефона:</h3>
                        <input type="text" data-phone-enter="#phoneEnter" name="phone"
                               placeholder="+7-(..."
                               value="{{ old('phone') ?? $user->phone }}">
                        @error('phone')
                        <div class="phone-error">
                            <span>Указан неверный или уже используемый номер телефона.</span>
                        </div>
                        @enderror
                    </div>
                @endif
                @if(!$user->birthday)
                    <div class="birthday">
                        <h3>Дата рождения:</h3>
                        <input type="text" data-birthday-enter="#birthdayEnter" name="birthday"
                               placeholder="01.01.1991"
                               value="{{ old('birthday') ?? $user->birthday }}">
                        @error('birthday')
                        <div class="birthday-error">
                            <span>{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                @endif
                <div class="salary">
                    <h3>Желаемая зарплата: (в рублях)</h3>
                    <input type="number" name="salary"
                           value="{{ old('salary') ?? $user->salary }}">
                    @error('salary')
                    <div class="salary-error">
                        <span>{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div class="city">
                    <h3>Город проживания:</h3>
                    <div class="city-select">
                        <select name="city_id">
                            @if($city = $user->city)
                                <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="education">
                    <h3>Информация об образовании: </h3>
                    <div class="education-select-container">
                        <div class="university-select">
                            <h4>Список ВУЗов: </h4>
                            <select name="universities[]" multiple>
                                @if($universities = $user->universities)
                                    @foreach($universities as $university)
                                        <option value="{{ $university->id }}"
                                                selected>{{ $university->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="collage-select">
                            <h4>Список ССУЗВов</h4>
                            <select name="collages[]" multiple>
                                @if($collages = $user->collages)
                                    @foreach($collages as $collage)
                                        <option value="{{ $collage->id }}" selected>{{ $collage->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="softs">
                    <h3>Гибкие навыки: </h3>
                    <select name="softs[]" multiple>
                        @if($softs = $user->softs)
                            @foreach($softs as $soft)
                                <option value="{{ $soft->id }}"
                                        selected>{{ $soft->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="hards">
                    <h3>Профессиональные навыки: </h3>
                    <select name="hards[]" multiple>
                        @if($hards = $user->hards)
                            @foreach($hards as $hard)
                                <option value="{{ $hard->id }}"
                                        selected>{{ $hard->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="specifications">
                    <div>
                        <h3>Занятость:</h3>
                        @foreach($employments as $employment)
                            <div>
                                <input type="checkbox" name="employments[]" id="{{ $employment->slug }}"
                                       value="{{ $employment->id }}" @checked($user->employments->find($employment->id)?->exists())>
                                <label for="{{ $employment->slug }}">{{ $employment->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <h3>График работы:</h3>
                        @foreach($charts as $chart)
                            <div>
                                <input type="checkbox" name="charts[]" id="{{ $chart->slug }}"
                                       value="{{ $chart->id }}" @checked($user->charts->find($chart->id)?->exists())>
                                <label for="{{ $chart->slug }}">{{ $chart->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endemailVerified
                <div class="controls">
                    <button class="profile-update" type="submit">Обновить</button>
                    <button class="profile-delete" data-delete-account="#deleteAccountConfirmation">Удалить аккаунт
                    </button>
                </div>

                @emailVerified
                <div class="password">
                    <a href="{{ route('user.password.edit') }}">Изменить пароль</a>
                </div>
                @endemailVerified
            </x-form>
        </div>
    </div>

    <x-main-modal modalId="deleteAccountConfirmation" modalTitle="Вы действительно хотите удалить свой аккаунт?">
        <div class="delete-account-confirmation">
            <x-form :action="route('user.delete', $user)" method="DELETE">
                <button type="submit">Да, удалить аккаунт</button>
            </x-form>
        </div>
    </x-main-modal>

    <x-main-modal modalId="phoneEnter" modalTitle="Предупреждение!">
        <div class="phone-enter">
            <p>После заполнения номера телефона его <span>НЕЛЬЗЯ</span> будет изменить. <br> Пожалуйста, будте
                внимательны.</p>
        </div>
    </x-main-modal>

    <x-main-modal modalId="birthdayEnter" modalTitle="Предупреждение!">
        <div class="phone-enter">
            <p>После заполнения даты рождения ее <span>НЕЛЬЗЯ</span> будет изменить. <br> Пожалуйста, будте
                внимательны.</p>
        </div>
    </x-main-modal>

</x-main-layout>
