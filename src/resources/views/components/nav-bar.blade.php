<nav class="nav-bar">
    <div class="nav-bar-logo">
        <a href="{{ route('main') }}">
            <img src="{{ asset('/images/logo.png') }}" alt="logo">
        </a>
    </div>

    <div class="toggle">
        <svg width="64px" height="64px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
             xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
             fill="#ffffff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier"><title>plus-circle</title>
                <desc>Created with Sketch Beta.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-464.000000, -1087.000000)"
                       fill="#ffffff">
                        <path
                            d="M480,1117 C472.268,1117 466,1110.73 466,1103 C466,1095.27 472.268,1089 480,1089 C487.732,1089 494,1095.27 494,1103 C494,1110.73 487.732,1117 480,1117 L480,1117 Z M480,1087 C471.163,1087 464,1094.16 464,1103 C464,1111.84 471.163,1119 480,1119 C488.837,1119 496,1111.84 496,1103 C496,1094.16 488.837,1087 480,1087 L480,1087 Z M486,1102 L481,1102 L481,1097 C481,1096.45 480.553,1096 480,1096 C479.447,1096 479,1096.45 479,1097 L479,1102 L474,1102 C473.447,1102 473,1102.45 473,1103 C473,1103.55 473.447,1104 474,1104 L479,1104 L479,1109 C479,1109.55 479.447,1110 480,1110 C480.553,1110 481,1109.55 481,1109 L481,1104 L486,1104 C486.553,1104 487,1103.55 487,1103 C487,1102.45 486.553,1102 486,1102 L486,1102 Z"
                            id="plus-circle" sketch:type="MSShapeGroup"></path>
                    </g>
                </g>
            </g>
        </svg>
    </div>

    <ul class="navigation">
        <li>
            <div>
                <a href="">Вакансии</a>
            </div>
        </li>
        <li>
            <div>
                <a @class(['active-page' => request()->routeIs('applicant.index')]) href="{{ route('applicant.index') }}">Соискатели</a>
            </div>
        </li>
        <li>
            <div>
                <a href="">F.A.Q.</a>
            </div>
        </li>
    </ul>

    <div class="controls">
        @auth
            <div>
                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                     stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                <a href="{{ route('user.log-out') }}">Выйти</a>
            </div>
            <div>
                <svg fill="#ffffff" width="64px" height="64px" viewBox="-8 0 512 512" xmlns="http://www.w3.org/2000/svg"
                     stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z"></path>
                    </g>
                </svg>
                <a href="{{ route('user.profile') }}" @class(['active-page' => request()->routeIs('user.profile') || request()->routeIs('user.edit') || request()->routeIs('user.password.edit')])>{{ auth()->user()->fullName(true) }}</a>
            </div>
        @else
            <div>
                <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                     stroke="#ffffff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M14 20H6C4.89543 20 4 19.1046 4 18L4 6C4 4.89543 4.89543 4 6 4H14M10 12H21M21 12L18 15M21 12L18 9"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
                <a href="{{ route('user.login') }}">Войти</a>
            </div>
        @endauth
    </div>
</nav>
