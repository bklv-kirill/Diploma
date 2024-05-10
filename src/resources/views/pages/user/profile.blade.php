@php($isApplicant = auth()->user()->id !== $user->id)

<x-main-layout title="Личный кабинет">

    <div class="profile">
        <div class="profile-container">
            <div class="user-container">
                <x-user-avatar :avatar="$user->avatar()" :fullUserName="$user->fullName()"/>
                <div class="user-fio">
                    @if($user->gender)
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             width="64px" height="64px" viewBox="0 0 64 64"
                             enable-background="new 0 0 64 64" xml:space="preserve" fill="#4070f4" stroke="#4070f4"><g
                                id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path fill="#4070f4"
                                          d="M62.242,47.758l0.014-0.014c-5.847-4.753-12.84-8.137-20.491-9.722C44.374,35.479,46,31.932,46,28 c1.657,0,3-1.343,3-3v-2c0-0.886-0.391-1.673-1-2.222V12c0-6.627-5.373-12-12-12h-8c-6.627,0-12,5.373-12,12v8.778 c-0.609,0.549-1,1.336-1,2.222v2c0,1.657,1.343,3,3,3c0,3.932,1.626,7.479,4.236,10.022c-7.652,1.586-14.646,4.969-20.492,9.722 l0.014,0.014C0.672,48.844,0,50.344,0,52v8c0,2.211,1.789,4,4,4h56c2.211,0,4-1.789,4-4v-8C64,50.344,63.328,48.844,62.242,47.758z M20,28v-1c0-0.553-0.447-1-1-1h-1c-0.553,0-1-0.447-1-1v-2c0-0.553,0.447-1,1-1h1c0.553,0,1-0.447,1-1v-1v-1c0-2.209,1.791-4,4-4 c2.088,0,3.926-1.068,5-2.687C30.074,13.932,31.912,15,34,15h6c2.209,0,4,1.791,4,4v1v1c0,0.553,0.447,1,1,1h1c0.553,0,1,0.447,1,1 v2c0,0.553-0.447,1-1,1h-1c-0.553,0-1,0.447-1,1v1c0,6.627-5.373,12-12,12S20,34.627,20,28z M24.285,39.678 C26.498,41.143,29.147,42,32,42s5.502-0.857,7.715-2.322c1.66,0.281,3.297,0.63,4.892,1.084C41.355,43.983,36.911,46,31.973,46 c-4.932,0-9.371-2.011-12.621-5.226C20.96,40.315,22.61,39.961,24.285,39.678z"></path>
                                    <path fill="#4070f4"
                                          d="M24.537,21.862c0.475,0.255,1.073,0.068,1.345-0.396C25.91,21.419,26.18,21,26.998,21 c0.808,0,1.096,0.436,1.111,0.458C28.287,21.803,28.637,22,28.999,22c0.154,0,0.311-0.035,0.457-0.111 c0.491-0.253,0.684-0.856,0.431-1.347C29.592,19.969,28.651,19,26.998,19c-1.691,0-2.618,0.983-2.9,1.564 C23.864,21.047,24.063,21.609,24.537,21.862z"></path>
                                    <path fill="#4070f4"
                                          d="M34.539,21.862c0.475,0.255,1.073,0.068,1.345-0.396C35.912,21.419,36.182,21,37,21 c0.808,0,1.096,0.436,1.111,0.458C38.289,21.803,38.639,22,39.001,22c0.154,0,0.311-0.035,0.457-0.111 c0.491-0.253,0.684-0.856,0.431-1.347C39.594,19.969,38.653,19,37,19c-1.691,0-2.618,0.983-2.9,1.564 C33.866,21.047,34.065,21.609,34.539,21.862z"></path>
                                </g>
                            </g></svg>
                    @else
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             width="64px" height="64px" viewBox="0 0 64 64"
                             enable-background="new 0 0 64 64" xml:space="preserve" fill="#4070f4"><g
                                id="SVGRepo_bgCarrier"
                                stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <path fill="#4070f4"
                                          d="M62.242,47.758l0.014-0.014c-3.239-2.634-6.865-4.874-10.839-6.644C50.502,38.229,50,35.175,50,32V16 c0-8.837-7.163-16-16-16h-4c-8.837,0-16,7.163-16,16v16c0,3.173-0.501,6.226-1.415,9.096c-3.979,1.745-7.526,3.953-10.841,6.648 l0.014,0.014C0.672,48.844,0,50.344,0,52v8c0,2.211,1.789,4,4,4h56c2.211,0,4-1.789,4-4v-8C64,50.344,63.328,48.844,62.242,47.758z M20,19c0-2.209,1.791-4,4-4c2.088,0,3.926-1.068,5-2.687C30.074,13.932,31.912,15,34,15h4c3.313,0,6,2.687,6,6c0,0.188,0,0.5,0,1 c0,12-7.469,18-12,18s-12-6-12-18C20,21.5,20,19,20,19z M25.677,39.439C27.76,41.084,29.99,42,32,42s4.24-0.916,6.323-2.561 c2.743,0.378,5.399,1.018,7.966,1.857c-2.468,2.468-13.311,13.311-13.691,13.691c-0.43,0.43-0.748,0.447-1.183,0.013 C31.03,54.616,20.18,43.766,17.711,41.297C20.277,40.457,22.934,39.817,25.677,39.439z"></path>
                                    <path fill="#4070f4"
                                          d="M25.882,22.467C25.91,22.419,26.18,22,26.998,22c0.808,0,1.096,0.436,1.111,0.458 C28.287,22.803,28.637,23,28.999,23c0.154,0,0.311-0.035,0.457-0.111c0.491-0.253,0.684-0.856,0.431-1.347 C29.592,20.969,28.651,20,26.998,20c-1.691,0-2.618,0.983-2.9,1.564c-0.233,0.482-0.034,1.045,0.439,1.298 C25.012,23.117,25.61,22.931,25.882,22.467z"></path>
                                    <path fill="#4070f4"
                                          d="M34.539,22.862c0.475,0.255,1.073,0.068,1.345-0.396C35.912,22.419,36.182,22,37,22 c0.808,0,1.096,0.436,1.111,0.458C38.289,22.803,38.639,23,39.001,23c0.154,0,0.311-0.035,0.457-0.111 c0.491-0.253,0.684-0.856,0.431-1.347C39.594,20.969,38.653,20,37,20c-1.691,0-2.618,0.983-2.9,1.564 C33.866,22.047,34.065,22.609,34.539,22.862z"></path>
                                </g>
                            </g></svg>
                    @endif
                    <span>{{ $user->fullName() }}</span>
                </div>
                <div class="user-contacts">
                    <h3>Контакты</h3>
                    <x-user-edit-contact contactTitle="Номер телефона:" :contact="$user->phone ?? 'не указан'"/>
                    <x-user-edit-contact contactTitle="Email:" :contact="$user->email"/>
                </div>
                @if($isApplicant)
                    <a href="mailto:{{ $user->email }}" class="user-profile-edit">Написать на почту</a>
                    @if($user->phone)
                        <a href="tel::{{ $user->phone }}" class="user-profile-edit">Позвонить</a>
                    @endif
                @else
                    <a href="{{ route('user.edit') }}" class="user-profile-edit">Редактировать профиль</a>
                @endif
            </div>
            <div class="user-info">
                <div class="user-created">
                    <h3>На сайте с
                        <span>{{ getFormatedDate($user->created_at) }}</span>
                    </h3>
                </div>
                <div class="user-about">
                    <h3>Обо мне:</h3>
                    <p>- {{ $user->about ??  'Информация отсутствует' }}</p>
                </div>
                <div class="user-salary">
                    <h3>Желаемая зарплата: </h3>
                    <p>- {!! getMoney($user->salary) ?? 'Информация отсутствует' !!}</p>
                </div>
                <div class="user-education">
                    <h3>Образование:</h3>
                    @if($user->universities->isNotEmpty() || $user->collages->isNotEmpty())
                        @if($universities = $user->universities)
                            @foreach($universities as $university)
                                <p>- {{ $university->name }}</p>
                            @endforeach
                        @endif
                        @if($collages = $user->collages)
                            @foreach($collages as $collage)
                                <p>- {{ $collage->name }}</p>
                            @endforeach
                        @endif
                    @else
                        <p>- Информация отсутствует</p>
                    @endif
                </div>
                <div class="user-softs">
                    <h3>Гибкие навыки: </h3>
                    @forelse($user->softs as $soft)
                        <p>- {{ $soft->name }}</p>
                    @empty
                        <p>- Информация отсутствует</p>
                    @endforelse
                </div>
                <div class="user-softs">
                    <h3>Профессиональные навыки: </h3>
                    @forelse($user->hards as $hard)
                        <p>- {{ $hard->name }}</p>
                    @empty
                        <p>- Информация отсутствует</p>
                    @endforelse
                </div>
                <div class="user-birthday">
                    <h3>Дата рождения: </h3>
                    <p>- {{ getFormatedDate($user->birthday) ??  'Информация отсутствует' }}</p>
                </div>
                <div class="user-specifications">
                    <x-user-profile-specification specificationTitle="Тип занятости:"
                                                  :specifications="$user->employments"/>
                    <x-user-profile-specification specificationTitle="График работы:" :specifications="$user->charts"/>
                </div>
                <div class="user-city">
                    <h3>Город проживания:</h3>
                    <p>- {{ $user->city->name ?? 'Информация отсутствует' }}</p>
                    @if($user->city)
                        <div class="ymap-container"></div>

                        <script>
                            ymapCoords = {
                                'geo_lat': {!! $user->city->geo_lat !!},
                                'geo_lon': {!! $user->city->geo_lon !!}
                            };
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-main-layout>
