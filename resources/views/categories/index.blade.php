@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Categorías</h1>

<table class="w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-2 text-left">Nombre</th>
            <th class="p-2 text-left">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr class="border-t">
            <td class="p-2">{{ $category->name }}</td>
            <td class="p-2 space-x-2">
                {{-- Botón Editar --}}
                <a href="{{ route('categories.edit', $category->id) }}" 
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                    Editar
                </a>

                {{-- Botón Eliminar --}}
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')" 
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
