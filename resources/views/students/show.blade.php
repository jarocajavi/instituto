<x-layouts.layout>
    <div class="flex justify-center items-center min-h-full bg-gray-200">
        <div class="bg-white p-6 rounded-2xl w-96">
            <h2 class="text-xl font-bold mb-4">{{ $student->name }}</h2>
            <div class="mt-2">
                <span class="font-semibold">Email:</span>
                <span>{{ $student->email }}</span>
            </div>
            <div class="mt-2">
                <span class="font-semibold">Teléfono:</span>
                <span>{{ $student->phone }}</span>
            </div>
            <div class="mt-2">
                <span class="font-semibold">Curso:</span>
                <span>{{ $student->course }}</span>
            </div>
            <div class="mt-2">
                <span class="font-semibold">Fecha de nacimiento:</span>
                <span>{{ $student->birth_date }}</span>
            </div>
            <div class="flex justify-end mt-6">
                <a href="{{ route('students.index') }}" class="text-blue-500 hover:underline">
                    Volver
                </a>
            </div>
        </div>
    </div>
</x-layouts.layout>
