<nav class="bg-gradient-to-r from-zinc-900 to-zinc-800 border-b border-orange-500/20
            flex flex-col lg:flex-row px-5 lg:items-center lg:space-x-1 lg:h-nav">

    <a href="{{ route('main') }}"
       class="btn btn-ghost text-zinc-400 hover:text-orange-400 hover:bg-zinc-700 w-full lg:w-auto text-sm">
        {{ __('menu.home') }}
    </a>

    @auth
        @foreach(config('resources') as $resource => $data)
            @php
                $roles = $data['roles'] ?? [];
                $canAccess = empty($roles) || auth()->user()->hasAnyRole($roles);
            @endphp
            @if($canAccess)
                <a href="{{ route('crud.index', $resource) }}"
                   class="btn btn-ghost text-zinc-300 hover:text-white hover:bg-orange-600/80
                          w-full lg:w-auto text-sm
                          {{ request()->segment(1) === $resource ? 'bg-orange-600/40 text-orange-300' : '' }}">
                    {{ __("menu.$resource") }}
                </a>
            @endif
        @endforeach
    @endauth
</nav>
