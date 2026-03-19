<x-layouts.layout>
    {{-- 7 tarjetas en una línea en desktop, 1 columna en móvil --}}
    <div class="flex flex-col md:flex-row md:flex-wrap lg:flex-nowrap gap-3 items-stretch">

        @php
        $cards = [
            'teachers'    => ['img' => '/images/teachers.jpeg',  'label' => 'Profesores'],
            'students'    => ['img' => '/images/students.jpeg',  'label' => 'Alumnos'],
            'departments' => ['img' => null,                     'label' => 'Departamentos'],
            'groups'      => ['img' => null,                     'label' => 'Grupos'],
            'subjects'    => ['img' => null,                     'label' => 'Asignaturas'],
            'projects'    => ['img' => '/images/projects.jpeg',  'label' => 'Proyectos'],
            'tasks'       => ['img' => '/images/tasks.jpeg',     'label' => 'Tareas'],
        ];

        $svgs = [
            'departments' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full object-cover"><rect width="64" height="64" fill="#1c1c1e"/><rect x="8" y="20" width="20" height="28" rx="2" fill="#f97316" opacity="0.8"/><rect x="22" y="12" width="20" height="36" rx="2" fill="#f97316"/><rect x="36" y="20" width="20" height="28" rx="2" fill="#f97316" opacity="0.8"/><rect x="4" y="48" width="56" height="4" rx="1" fill="#f97316" opacity="0.5"/></svg>',
            'groups'      => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full object-cover"><rect width="64" height="64" fill="#1c1c1e"/><circle cx="20" cy="24" r="8" fill="#f97316" opacity="0.7"/><circle cx="44" cy="24" r="8" fill="#f97316" opacity="0.7"/><circle cx="32" cy="22" r="9" fill="#f97316"/><ellipse cx="20" cy="44" rx="12" ry="7" fill="#f97316" opacity="0.5"/><ellipse cx="44" cy="44" rx="12" ry="7" fill="#f97316" opacity="0.5"/><ellipse cx="32" cy="46" rx="13" ry="8" fill="#f97316" opacity="0.8"/></svg>',
            'subjects'    => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-full h-full object-cover"><rect width="64" height="64" fill="#1c1c1e"/><rect x="10" y="8" width="26" height="34" rx="2" fill="#f97316" opacity="0.9"/><rect x="14" y="12" width="18" height="2" rx="1" fill="#1c1c1e"/><rect x="14" y="17" width="18" height="2" rx="1" fill="#1c1c1e"/><rect x="14" y="22" width="12" height="2" rx="1" fill="#1c1c1e"/><rect x="18" y="14" width="26" height="34" rx="2" fill="#f97316" opacity="0.6"/><rect x="26" y="20" width="26" height="34" rx="2" fill="#f97316" opacity="0.4"/></svg>',
        ];
        @endphp

        @foreach($cards as $resource => $card)
            @php
                $data = config("resources.$resource");
                $roles = $data['roles'] ?? [];
                $canAccess = empty($roles) || auth()->user()->hasAnyRole($roles);
            @endphp

            @if($canAccess)
            <a href="{{ route('crud.index', $resource) }}"
               class="group relative overflow-hidden rounded-xl border border-zinc-700
                      hover:border-orange-500/70 transition-all duration-300
                      flex-1 min-w-0 md:min-w-[calc(33%-0.5rem)] lg:min-w-0
                      flex flex-col">

                {{-- Imagen --}}
                <div class="relative h-36 lg:h-28 xl:h-36 overflow-hidden bg-zinc-900">
                    @if($card['img'])
                        <img src="{{ asset($card['img']) }}"
                             alt="{{ $card['label'] }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 opacity-80 group-hover:opacity-100">
                    @else
                        {!! $svgs[$resource] !!}
                    @endif
                    {{-- Overlay degradado --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-900 via-transparent to-transparent"></div>
                </div>

                {{-- Label --}}
                <div class="bg-zinc-800/80 group-hover:bg-zinc-800 px-3 py-2 flex items-center justify-between transition-colors">
                    <span class="text-zinc-200 font-semibold text-sm group-hover:text-orange-400 transition-colors">
                        {{ $card['label'] }}
                    </span>
                    <span class="text-orange-500/50 group-hover:text-orange-400 transition-colors text-xs">→</span>
                </div>

            </a>
            @endif
        @endforeach

    </div>

    {{-- Bienvenida --}}
    <div class="mt-6 text-center">
        <p class="text-zinc-500 text-sm">
            Conectado como <span class="text-orange-400 font-semibold">{{ auth()->user()->name }}</span>
            · {{ now()->format('d/m/Y') }}
        </p>
    </div>

</x-layouts.layout>
