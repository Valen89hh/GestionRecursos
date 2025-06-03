@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Editar Recurso</h1>

<form action="{{ route('resources.update', $resource->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Título</label>
        <input type="text" name="title" value="{{ old('title', $resource->title) }}" class="w-full border rounded p-2">
    </div>

    <div>
        <label class="block font-semibold">Descripción</label>
        <textarea name="description" rows="4" class="w-full border rounded p-2">{{ old('description', $resource->description) }}</textarea>
    </div>

    <div>
        <label class="block font-semibold">Categoría</label>
        <select name="category_id" class="w-full border rounded p-2">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($resource->category_id == $category->id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold">Imagen actual</label>
        @if($resource->image_path)
            <img src="{{ asset('storage/' . $resource->image_path) }}" class="w-32 mb-2 rounded">
        @else
            <p>No hay imagen</p>
        @endif
    </div>

    <div>
        <label class="block font-semibold">Nueva imagen (opcional)</label>
        <input type="file" name="image">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Guardar cambios
    </button>
</form>
@endsection
