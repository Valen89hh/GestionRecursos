@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard de Recursos</h1>
<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2">Título</th>
            <th class="p-2">Categoría</th>
            <th class="p-2">Descripción</th>
            <th class="p-2">Acciones</th> <!-- Nueva columna -->
        </tr>
    </thead>
    <tbody>
        @foreach($resources as $resource)
        <tr class="border-t">
            <td class="p-2">{{ $resource->title }}</td>
            <td class="p-2">{{ $resource->category->name }}</td>
            <td class="p-2">{{ $resource->description }}</td>
            <td class="p-2 flex gap-2">
                <a href="{{ route('resources.edit', $resource->id) }}" 
                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Editar</a>
                
                <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este recurso?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
