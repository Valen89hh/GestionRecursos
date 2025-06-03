@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Crear Recurso</h1>
<form method="POST" action="/resources" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input type="text" name="title" placeholder="Título" class="w-full p-2 border rounded" required>
    <textarea name="description" placeholder="Descripción" class="w-full p-2 border rounded" required></textarea>
    <select name="category_id" class="w-full p-2 border rounded" required>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    <input type="file" name="image" class="w-full p-2 border rounded" required>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
</form>
@endsection
