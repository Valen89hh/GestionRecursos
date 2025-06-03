@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Recursos Educativos</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($resources as $resource)
    <div class="bg-white rounded shadow p-4">
        <img src="{{ asset('storage/' . $resource->image_path) }}" class="h-40 w-full object-cover mb-2">
        <h2 class="text-lg font-semibold">{{ $resource->title }}</h2>
        <p class="text-sm text-gray-600">{{ $resource->description }}</p>
        <span class="text-xs text-blue-500">{{ $resource->category->name }}</span>
    </div>
    @endforeach
</div>
@endsection
