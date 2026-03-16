<x-layouts.layout>
    @guest
        <div
            class="hero min-h-full"
            style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp)"
        >
            <div class="hero-overlay"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                    <p class="mb-5">
                        {{date("H:m:s")}}

                        Usuario conectado {{$nombre}}
                    <h2>Número generado <span class="text-3xl text-red-100  ">{{$numero}}</h2>
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>
    @endguest
    @auth
        <div class="lg:h-main bg-base-200
        grid
                     grid-cols-1
                     sm:grid-cols-2
                     lg:grid-cols-3
                     gap-6 p-6
                     items-start
                     overflow-y-auto">

            {{-- Ejemplo de tarjetas --}}
            <x-card>
                <x-slot name="label">{{__("Ver proyectos")}}</x-slot>
                <x-slot name="img">{{asset('/images/projects.png')}}</x-slot>
                <x-slot name="title">Gestión de Proyectos</x-slot>
                <x-slot name="description">Vamos a ver un Crud con los proyectos</x-slot>
                <x-slot name="ref">{{route("projects.index")}}</x-slot>

            </x-card>

            <x-card :label="__('Ver Profesores')"
                    :img="asset('/images/teachers.jpeg')"
                    title="Gestión de Profesores"
                    description="Vamos a ver un Crud de los Profesores"
                    ref="{{route('teachers.index')}}" />
            <x-card :label="__('Ver Estudiantes')"
                    :img="asset('/images/student.jpeg')"
                    title="Gestión de Estudiantes"
                    description="Vamos a ver un Crud de los Estudiantes"
                    ref="{{route('teachers.index')}}" />
            <x-card :label="__('Ver  Registrados sin rol')"
                    :img="asset('/images/registered.jpeg')"
                    title="Gestión de Usuarios solo logueados sin rol"
                    description="Vamos a ver un Crud de los logueados"
                    ref="{{route('teachers.index')}}" />
            <x-card :label="__('Ver  Usuarios')"
                    :img="asset('/images/user.jpeg')"
                    title="Gestión de todos los usuarios"
                    description="Vamos a ver un Crud de los Usuarios"
                    ref="{{route('teachers.index')}}" />

        </div>
    @endauth
</x-layouts.layout>
