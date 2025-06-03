@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Crear Categoría</h1>
<form method="POST" action="/categories" class="space-y-4">
    @csrf
    <input type="text" name="name" placeholder="Nombre de categoría" class="w-full p-2 border rounded" required>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
</form>
@endsection
