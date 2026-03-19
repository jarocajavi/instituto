<x-layouts.layout>
    @guest
        <div class="hero min-h-full rounded-xl overflow-hidden"
             style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp)">
            <div class="hero-overlay bg-zinc-950/70"></div>
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="mb-3 text-5xl font-bold text-white">{{ __('GESTION DE INSTITUTO') }}</h1>
                    <a href="{{ route('login') }}" class="btn bg-orange-500 hover:bg-orange-600 text-white border-0">
                        {{ __('Log in') }}
                    </a>
                </div>
            </div>
        </div>
    @endguest

    @auth
        @if(auth()->user()->hasRole('alumno'))
            {{-- PANEL ALUMNO --}}
            <div class="max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-orange-400 mb-6">👤 Mi perfil</h2>

                <div class="bg-zinc-800 rounded-xl border border-zinc-700 p-6 mb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <p class="text-zinc-500 text-xs uppercase mb-1">Nombre</p>
                            <p class="text-zinc-200 font-semibold">{{ auth()->user()->name }}</p>
                        </div>
                        <div>
                            <p class="text-zinc-500 text-xs uppercase mb-1">Email</p>
                            <p class="text-zinc-200">{{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <p class="text-zinc-500 text-xs uppercase mb-1">DNI</p>
                            <p class="text-zinc-200">{{ auth()->user()->dni ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-zinc-500 text-xs uppercase mb-1">Teléfono</p>
                            <p class="text-zinc-200">{{ auth()->user()->phone ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-zinc-500 text-xs uppercase mb-1">Usuario</p>
                            <p class="text-zinc-200">{{ auth()->user()->username ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-zinc-500 text-xs uppercase mb-1">Rol</p>
                            <p class="text-orange-400 font-semibold capitalize">
                                {{ auth()->user()->getRoleNames()->first() }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}"
                           class="btn btn-sm bg-orange-500 hover:bg-orange-600 text-white border-0">
                            ✏️ Editar mis datos
                        </a>
                    </div>
                </div>

                <div class="bg-zinc-800/50 rounded-xl border border-zinc-700 p-6">
                    <h3 class="text-lg font-semibold text-orange-300 mb-3">📋 Mis proyectos y tareas</h3>
                    <p class="text-zinc-500 text-sm">Próximamente podrás ver aquí tus proyectos y tareas asignadas.</p>
                </div>
            </div>

        @else
            {{-- PANEL ADMIN / DIRECTOR / PROFESOR --}}
            @php
            $svgs = [
                'teachers' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full"><rect width="64" height="64" fill="#18181b"/><rect x="8" y="8" width="34" height="26" rx="2" fill="#f97316" opacity="0.9"/><rect x="11" y="11" width="28" height="20" rx="1" fill="#1c1c1e"/><rect x="13" y="14" width="18" height="2" rx="1" fill="#f97316" opacity="0.7"/><rect x="13" y="19" width="14" height="2" rx="1" fill="#f97316" opacity="0.5"/><circle cx="46" cy="18" r="8" fill="#f97316" opacity="0.8"/><path d="M38 38 Q46 32 54 38 L54 48 L38 48 Z" fill="#f97316" opacity="0.6"/><rect x="8" y="38" width="28" height="3" rx="1" fill="#f97316" opacity="0.4"/><rect x="8" y="44" width="22" height="3" rx="1" fill="#f97316" opacity="0.3"/></svg>',
                'students' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full"><rect width="64" height="64" fill="#18181b"/><polygon points="32,8 56,20 32,32 8,20" fill="#f97316" opacity="0.9"/><polygon points="32,20 44,26 44,38 32,44 20,38 20,26" fill="#f97316" opacity="0.5"/><rect x="44" y="20" width="3" height="18" rx="1" fill="#f97316" opacity="0.7"/><circle cx="45.5" cy="40" r="3" fill="#f97316" opacity="0.8"/><rect x="20" y="46" width="24" height="3" rx="1" fill="#f97316" opacity="0.4"/><rect x="24" y="52" width="16" height="3" rx="1" fill="#f97316" opacity="0.3"/></svg>',
                'departments' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full"><rect width="64" height="64" fill="#18181b"/><rect x="8" y="20" width="20" height="28" rx="2" fill="#f97316" opacity="0.8"/><rect x="22" y="12" width="20" height="36" rx="2" fill="#f97316"/><rect x="36" y="20" width="20" height="28" rx="2" fill="#f97316" opacity="0.8"/><rect x="4" y="48" width="56" height="4" rx="1" fill="#f97316" opacity="0.5"/><rect x="12" y="24" width="8" height="6" rx="1" fill="#1c1c1e" opacity="0.6"/><rect x="26" y="18" width="8" height="6" rx="1" fill="#1c1c1e" opacity="0.6"/><rect x="40" y="24" width="8" height="6" rx="1" fill="#1c1c1e" opacity="0.6"/></svg>',
                'groups' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full"><rect width="64" height="64" fill="#18181b"/><circle cx="16" cy="22" r="7" fill="#f97316" opacity="0.6"/><circle cx="32" cy="18" r="9" fill="#f97316" opacity="0.9"/><circle cx="48" cy="22" r="7" fill="#f97316" opacity="0.6"/><ellipse cx="16" cy="42" rx="11" ry="7" fill="#f97316" opacity="0.4"/><ellipse cx="32" cy="46" rx="13" ry="8" fill="#f97316" opacity="0.7"/><ellipse cx="48" cy="42" rx="11" ry="7" fill="#f97316" opacity="0.4"/></svg>',
                'subjects' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full"><rect width="64" height="64" fill="#18181b"/><rect x="8" y="6" width="28" height="36" rx="2" fill="#f97316" opacity="0.9"/><rect x="12" y="10" width="20" height="2" rx="1" fill="#1c1c1e"/><rect x="12" y="15" width="20" height="2" rx="1" fill="#1c1c1e"/><rect x="12" y="20" width="14" height="2" rx="1" fill="#1c1c1e"/><rect x="16" y="12" width="28" height="36" rx="2" fill="#f97316" opacity="0.6"/><rect x="24" y="18" width="28" height="36" rx="2" fill="#f97316" opacity="0.35"/></svg>',
                'projects' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full"><rect width="64" height="64" fill="#18181b"/><rect x="6" y="10" width="52" height="36" rx="3" fill="#f97316" opacity="0.15"/><rect x="6" y="10" width="52" height="8" rx="3" fill="#f97316" opacity="0.8"/><circle cx="14" cy="14" r="2" fill="#1c1c1e"/><circle cx="21" cy="14" r="2" fill="#1c1c1e"/><circle cx="28" cy="14" r="2" fill="#1c1c1e"/><rect x="12" y="24" width="18" height="3" rx="1" fill="#f97316" opacity="0.7"/><rect x="12" y="30" width="28" height="3" rx="1" fill="#f97316" opacity="0.5"/><rect x="12" y="36" width="22" height="3" rx="1" fill="#f97316" opacity="0.4"/><rect x="36" y="24" width="16" height="15" rx="2" fill="#f97316" opacity="0.6"/><rect x="6" y="46" width="52" height="4" rx="1" fill="#f97316" opacity="0.3"/></svg>',
                'tasks' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full"><rect width="64" height="64" fill="#18181b"/><rect x="10" y="8" width="44" height="48" rx="3" fill="#f97316" opacity="0.15"/><rect x="10" y="8" width="44" height="48" rx="3" stroke="#f97316" stroke-width="1.5" fill="none" opacity="0.4"/><circle cx="20" cy="20" r="3" fill="#f97316" opacity="0.9"/><rect x="27" y="18" width="20" height="3" rx="1" fill="#f97316" opacity="0.7"/><circle cx="20" cy="32" r="3" fill="#f97316" opacity="0.6"/><rect x="27" y="30" width="16" height="3" rx="1" fill="#f97316" opacity="0.5"/><circle cx="20" cy="44" r="3" fill="#f97316" opacity="0.4"/><rect x="27" y="42" width="22" height="3" rx="1" fill="#f97316" opacity="0.35"/><polyline points="17,20 19,22 23,17" stroke="#18181b" stroke-width="1.5" fill="none"/></svg>',
            ];

            $cards = [
                'teachers'    => ['emoji' => '👨‍🏫', 'label' => __('menu.teachers')],
                'students'    => ['emoji' => '🎓',   'label' => __('menu.students')],
                'departments' => ['emoji' => '🏢',   'label' => __('menu.departments')],
                'groups'      => ['emoji' => '👥',   'label' => __('menu.groups')],
                'subjects'    => ['emoji' => '📚',   'label' => __('menu.subjects')],
                'projects'    => ['emoji' => '🗂️',  'label' => __('menu.projects')],
                'tasks'       => ['emoji' => '✅',   'label' => __('menu.tasks')],
            ];
            @endphp

            <div class="flex flex-col md:grid md:grid-cols-3 lg:flex lg:flex-row gap-3">
                @foreach($cards as $resource => $card)
                    @php
                        $data  = config("resources.$resource");
                        $roles = $data['roles'] ?? [];
                        $canAccess = empty($roles) || auth()->user()->hasAnyRole($roles);
                    @endphp
                    @if($canAccess)
                    <a href="{{ route('crud.index', $resource) }}"
                       class="group relative overflow-hidden rounded-xl border border-zinc-700
                              hover:border-orange-500/70 transition-all duration-300
                              lg:flex-1 flex flex-col min-w-0">
                        <div class="relative overflow-hidden bg-zinc-900"
                             style="height: clamp(100px, 15vw, 180px)">
                            {!! $svgs[$resource] !!}
                            <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-zinc-900/20 to-transparent"></div>
                        </div>
                        <div class="bg-zinc-800/90 group-hover:bg-zinc-800 px-3 py-2
                                    flex items-center justify-between transition-colors">
                            <span class="text-zinc-200 font-semibold text-sm group-hover:text-orange-400 transition-colors truncate">
                                {{ $card['emoji'] }} {{ $card['label'] }}
                            </span>
                            <span class="text-orange-500/40 group-hover:text-orange-400 transition-colors ml-2">→</span>
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>

            <p class="mt-4 text-center text-zinc-600 text-xs">
                {{ now()->format('d/m/Y') }} · {{ auth()->user()->name }}
            </p>
        @endif
    @endauth
</x-layouts.layout>
