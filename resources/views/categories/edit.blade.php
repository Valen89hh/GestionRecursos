@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar Categoría</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4 max-w-md">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold mb-1" for="name">Nombre</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $category->name) }}"
            class="w-full border rounded p-2"
            required
        >
        @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
    >
        Guardar cambios
    </button>
</form>
@endsection
