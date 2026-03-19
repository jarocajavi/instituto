{{-- Desktop --}}
<header class="hidden lg:flex flex-row justify-between items-center px-8 py-3 h-header bg-gradient-to-r from-zinc-950 via-zinc-900 to-zinc-950 border-b border-orange-500/30">

    <div class="flex items-center gap-4">
        <img class="max-h-12" src="{{ asset('/images/logo.png') }}" alt="logo">
        <span class="w-px h-10 bg-orange-500/40"></span>
        <h1 class="text-2xl xl:text-3xl font-bold tracking-wide text-titulo text-center">
            {{ __('GESTION DE INSTITUTO') }}
        </h1>
    </div>

    <div class="flex items-center gap-4">
        @guest
            <a href="{{ route('login') }}">
                <button class="btn btn-sm bg-orange-500 hover:bg-orange-600 text-white border-0">
                    {{ __('Login') }}
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button class="btn btn-sm btn-outline border-orange-500 text-orange-400 hover:bg-orange-500 hover:text-white">
                    {{ __('Register') }}
                </button>
            </a>
        @endguest

        @auth
            <div class="flex items-center gap-3">
                <span class="text-zinc-300 text-sm">
                    Hola, <span class="text-orange-400 font-semibold">{{ auth()->user()->name }}</span>
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm bg-zinc-700 hover:bg-zinc-600 text-zinc-200 border-0" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        @endauth

        {{-- Selector de idioma --}}
        @if(config('langs'))
        <form action="{{ route('set_lang') }}" method="POST">
            @csrf
            <select class="select select-sm bg-zinc-800 text-zinc-300 border-zinc-600 focus:border-orange-500" style="width:155px"
                    name="lang" onchange="this.form.submit()">
                <option disabled>{{ __('Idioma') }}</option>
                @foreach(config('langs') as $lang => $detail)
                    <option {{ $lang == app()->getLocale() ? 'selected' : '' }} value="{{ $lang }}">
                        {{ $detail['flag'] }} {{ $detail['name'] }}
                    </option>
                @endforeach
            </select>
        </form>
        @endif
    </div>
</header>

{{-- Móvil --}}
<header class="lg:hidden flex flex-row justify-between items-center px-4 py-3 bg-zinc-950 border-b border-orange-500/30">
    <img class="h-10" src="{{ asset('/images/logo.png') }}" alt="logo">
    <h1 class="text-sm font-bold text-orange-400">INSTITUTO</h1>

    <div class="flex gap-2">
        @guest
            <a href="{{ route('login') }}" class="btn btn-xs bg-orange-500 text-white border-0">Login</a>
        @endguest
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-xs bg-zinc-700 text-zinc-200 border-0">Logout</button>
            </form>
        @endauth
    </div>
</header>
