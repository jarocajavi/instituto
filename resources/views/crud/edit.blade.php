<x-layouts.layout>
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('crud.index', $resource) }}"
               class="btn btn-sm bg-zinc-700 hover:bg-zinc-600 text-zinc-200 border-0">
                ← Volver
            </a>
            <h1 class="text-2xl font-bold text-orange-400">
                ✏️ Editar {{ $resource_name }}
            </h1>
        </div>

        <div class="bg-zinc-800 rounded-xl border border-zinc-700 p-6">
            @if($errors->any())
                <div class="alert bg-red-900 text-red-200 border-red-700 mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('crud.update', [$resource, $row->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($fields as $field => $meta)
                        @php
                            $label = is_array($meta) ? $meta['label'] : $meta;
                            $type  = is_array($meta) ? ($meta['type'] ?? 'text') : 'text';
                        @endphp
                        <div class="{{ $type === 'textarea' ? 'sm:col-span-2' : '' }}">
                            <label class="block text-zinc-400 text-sm mb-1">{{ $label }}</label>

                            @if($type === 'textarea')
                                <textarea name="{{ $field }}" rows="3"
                                    class="w-full bg-zinc-900 border border-zinc-600 rounded-lg px-3 py-2
                                           text-zinc-200 focus:border-orange-500 focus:outline-none text-sm">{{ old($field, $row->{$field}) }}</textarea>
                            @elseif($type === 'select' && $field === 'department_id')
                                <select name="{{ $field }}"
                                    class="w-full bg-zinc-900 border border-zinc-600 rounded-lg px-3 py-2
                                           text-zinc-200 focus:border-orange-500 focus:outline-none text-sm">
                                    <option value="">— Seleccionar —</option>
                                    @foreach(\App\Models\Department::orderBy('name')->get() as $dept)
                                        <option value="{{ $dept->id }}"
                                            {{ old($field, $row->{$field}) == $dept->id ? 'selected' : '' }}>
                                            {{ $dept->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <input type="{{ $type }}" name="{{ $field }}"
                                    value="{{ old($field, $row->{$field}) }}"
                                    class="w-full bg-zinc-900 border border-zinc-600 rounded-lg px-3 py-2
                                           text-zinc-200 focus:border-orange-500 focus:outline-none text-sm">
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-3 mt-6">
                    <button type="submit"
                            class="btn bg-orange-500 hover:bg-orange-600 text-white border-0">
                        💾 Guardar cambios
                    </button>
                    <a href="{{ route('crud.index', $resource) }}"
                       class="btn bg-zinc-700 hover:bg-zinc-600 text-zinc-200 border-0">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
