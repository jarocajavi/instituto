@props([
    'resource'=>"",
    'campos'=>[], //Array asociativo con nombre_campos => titulo para la tabla ("start_date"=>"Fecha de comienzo")
    'filas'=>[], //Un array de objetos
    'page'=>request()->get('page')
])

<a href="{{route("$resource.index")}}" class="btn btn-primary">Añadir {{strtoupper($resource)}}</a>
<div class="flex justify-center ">
    <div class="overflow-x-auto h-96 ">
        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr class="lg:text-2xl">
                @foreach($campos as $campo)
                    <th>{{$campo}}</th>
                @endforeach
                <th colspan="3">Acciones</th>

            </tr>
            </thead>
            <tbody>

            @foreach($filas as $fila)
                <tr class="lg:text-sm">


                    @foreach($campos as $atributo => $valor)
                        <td>{{$fila->{$atributo} }}</td>
                    @endforeach
                        <td>

                            <form action="{{route("$resource.destroy",$fila->id)}}?page={{$page}}" method="POST">

                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Borrar" class="btn btn-warning"
                                       onclick="return confirm('Seguro que quiers borrar')"
                                >
                            </form>
                        </td>
                        <td>
                            <a href="{{route("$resource.edit", $fila->id)}}?page={{$page}}" class="btn btn-primary">Editar</a>
                        </td>

                </tr>
            @endforeach

            </tbody>
        </table>
        {{$filas->links()}}
    </div>
</div>
