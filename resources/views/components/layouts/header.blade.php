{{--Diseño pantalla grande no móvil--}}
<header class="hidden lg:flex flex-row justify-between items-center p-3
h-header bg-header
">
    <img class="max-h-full" src="{{asset("/images/logo.png")}}" alt="logo">

    <h1 class=" text-3xl xl:text-5xl text-titulo">{{__("GESTION DE INSTITUTO")}}</h1>
    <div class="space-x-2">
        <form action="{{route("set_lang")}}" method="POST">
            @csrf
            <select name="lang" id="lang"
                    onchange="this.form.submit()">
                {{--            HAcer que el option sea un submit--}}
                @foreach(config("langs") as $lang => $detail)
                    <option value="{{$lang}}" {{ app()->getLocale() == $lang ? 'selected' : '' }}>
                        {{$detail['name']}} {{$detail['flag']}}
                    </option>
                @endforeach
            </select>
        </form>
        @guest

            <a href="{{route("login")}}">
                <button class="btn btn-sm btn-primary">{{__("Login")}}</button>
            </a>
            <a href="{{route("register")}}">
                <button class="btn btn-sm btn-primary">{{__("Register")}}</button>
            </a>

        @endguest
        @auth
            <span class="text-green-800 text-3xl">{{auth()->user()->name}}
            <form action="{{route("logout")}}" method="POST">
                @csrf
                <button class="btn btn-primary" type="submit">Logout</button>
            </form>

        @endauth
    </div>

</header>

{{--Diseño pantalla móvil--}}
<header class="lg:hidden flex flex-row justify-center items-center p-5 space-x-5
 bg-header
">
    <img class="max-h-full w-48 " src="{{asset("/images/logo.png")}}" alt="logo">

    <div class=" flex flex-row space-x-3  ">

        <div class="relative z-50">
            <input type="checkbox" class="peer sr-only" id="menu_lang">
            <label for="menu_lang">
                <img class="w-6 h-6 " src="{{asset("/images/lang.png")}}" alt="burguer button">
            </label>
            <label for="menu_lang" class="fixed inset-0 bg-black/40
                            opacity-0 pointer-events-none
                            peer-checked:opacity-100
                            peer-checked:pointer-events-auto
                            transition-opacity duration-300
                    "></label>
            <form action="{{route("set_lang")}}" method="POST" class="hidden peer-checked:flex flex-col absolute left-0 top-8 bg-white p-2 z-50">
                @csrf

                @foreach(config("langs") as $lang => $detail)
                    <button type="submit" name="lang" value="{{$lang}}" class="px-2 z-50 py-1 hover:bg-gray-100 rounded text-left">{{$detail['flag']}}
                    </button>
                    @endforeach
                    </select>
            </form>

        </div>
        @guest
            <div class="relative">

                <input type="checkbox" class="peer sr-only" id="menu_login">
                <label for="menu_login">
                    <img class="w-6 h-6 " src="{{asset("/images/burguer.png")}}" alt="burguer button">
                </label>
                <label for="menu_login" class="fixed inset-0 bg-black/40
                            opacity-0 pointer-events-none
                            peer-checked:opacity-100
                            peer-checked:pointer-events-auto
                            transition-opacity duration-300
                    "></label>

                <div class="hidden peer-checked:flex  flex-col  absolute left-8 ">
                    <a href="{{route("login")}}">
                        <button class="btn btn-sm btn-primary">{{__("Login")}}</button>
                    </a>
                    <a href="{{route("register")}}">
                        <button class="btn btn-sm btn-primary">{{__("Register")}}</button>
                    </a>
                </div>
            </div>
    @endguest
            @auth
                <div class="relative z-50">

                    {{-- Checkbox controlador --}}
                    <input type="checkbox" class="peer hidden" id="menu_user">

                    {{-- Botón usuario --}}
                    <label for="menu_user"
                           class="flex items-center gap-1 cursor-pointer
                      px-3 py-1 rounded bg-gray-100
                      hover:bg-gray-200 transition">

            <span class="text-green-800 font-semibold">
                {{ auth()->user()->name }}
            </span>

                        {{-- Flecha --}}
                        <svg class="w-4 h-4 transition-transform duration-200
                        peer-checked:rotate-180"
                             fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </label>

                    {{-- Overlay --}}
                    <label for="menu_user"
                           class="fixed inset-0 bg-black/30
                      opacity-0 pointer-events-none
                      peer-checked:opacity-100
                      peer-checked:pointer-events-auto
                      transition-opacity duration-300">
                    </label>

                    {{-- Dropdown --}}
                    <div class="hidden peer-checked:flex flex-col
                    absolute right-0 mt-2
                    bg-white shadow-lg rounded p-2 min-w-[120px]">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="btn btn-sm btn-primary w-full">
                                Logout
                            </button>
                        </form>

                    </div>

                </div>
            @endauth


</header>

