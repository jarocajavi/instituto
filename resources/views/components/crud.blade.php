@props([
    'resource' => "",
    'fields'   => [],
    'rows'     => [],
    'page'     => request('page', 1),
    'table'    => "",
    'resource_name' => "",
])

<div class="p-2">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-orange-400">{{ $table ?: ucfirst($resource) }}</h1>
        <a href="{{ route('crud.create', $resource) }}"
           class="btn btn-sm bg-orange-500 hover:bg-orange-600 text-white border-0">
            + {{ __('Add') }}
        </a>
    </div>

    @if(session('success'))
        <div class="alert bg-green-800 text-green-100 border-green-700 mb-4 rounded-lg">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-xl border border-zinc-700">
        <table class="table w-full">
            <thead>
                <tr class="bg-zinc-900 text-orange-400 border-b border-zinc-700">
                    @foreach($fields as $field => $meta)
                        <th class="font-semibold">{{ is_array($meta) ? $meta['label'] : $meta }}</th>
                    @endforeach
                    <th colspan="2" class="text-center font-semibold">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $i => $row)
                    <tr class="{{ $i % 2 === 0 ? 'bg-zinc-800' : 'bg-zinc-750' }} hover:bg-zinc-700 transition-colors border-b border-zinc-700/50">
                        @foreach($fields as $attribute => $meta)
                            <td class="text-zinc-200 text-sm max-w-xs truncate">
                                {{ Str::limit($row->{$attribute}, 50) }}
                            </td>
                        @endforeach
                        <td class="text-center">
                            <a href="{{ route('crud.edit', [$resource, $row->id]) }}?page={{ $page }}"
                               class="btn btn-xs bg-orange-500 hover:bg-orange-400 text-white border-2
                                      border-transparent hover:border-orange-300
                                      hover:shadow-[0_0_8px_rgba(249,115,22,0.8)] transition-all">
                                ✏️ {{ __('Edit') }}
                            </a>
                        </td>
                        <td class="text-center">
                            <form class="delete-form"
                                  action="{{ route('crud.destroy', [$resource, $row->id]) }}?page={{ $page }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                        onclick="confirmDelete(this)"
                                        class="btn btn-xs bg-red-800 hover:bg-red-600 text-red-200
                                               hover:text-white border-2 border-transparent
                                               hover:border-red-400
                                               hover:shadow-[0_0_8px_rgba(239,68,68,0.8)] transition-all">
                                    🗑️ {{ __('Delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($fields) + 2 }}"
                            class="text-center text-zinc-500 py-10 bg-zinc-800">
                            No hay registros
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex justify-center">
        {{ $rows->links() }}
    </div>
</div>

<script>
function confirmDelete(btn) {
    const form = btn.closest('form');
    Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f97316',
        cancelButtonColor: '#52525b',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        background: '#27272a',
        color: '#e4e4e7',
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
</script>
