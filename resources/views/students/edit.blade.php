<x-layouts.layout>
    <div class="flex justify-center items-center min-h-full bg-gray-200">
        <form method="POST" action="{{ route('students.update', $student) }}" class="bg-white p-4 rounded-2xl">
            @csrf
            @method('PUT')
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    value="{{old('name', $student->name)}}"
                    required
                />
            </div>
            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    value="{{old('email', $student->email)}}"
                    required
                />
            </div>
            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input
                    id="phone"
                    class="block mt-1 w-full"
                    type="text"
                    name="phone"
                    value="{{old('phone', $student->phone)}}"
                    required
                />
            </div>
            <!-- Course -->
            <div class="mt-4">
                <x-input-label for="course" :value="__('Course')" />
                <x-text-input
                    id="course"
                    class="block mt-1 w-full"
                    type="text"
                    name="course"
                    value="{{old('course', $student->course)}}"
                    required
                />
            </div>
            <!-- Birth Date -->
            <div class="mt-4">
                <x-input-label for="birth_date" :value="__('Birth date')" />
                <x-text-input
                    id="birth_date"
                    class="block mt-1 w-full"
                    type="date"
                    name="birth_date"
                    value="{{old('birth_date', $student->birth_date)}}"
                />
            </div>
            <div class="flex justify-end mt-6">
                <x-primary-button>
                    {{ __('Update Student') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-layouts.layout>
