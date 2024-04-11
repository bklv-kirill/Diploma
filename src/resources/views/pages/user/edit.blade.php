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
                <button class="profile-update" type="submit">Обновить</button>
            </x-form>
        </div>
    </div>

</x-main-layout>
