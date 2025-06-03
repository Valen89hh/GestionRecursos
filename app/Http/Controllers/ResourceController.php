<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index() {
        $resources = Resource::with('category')->get();
        return view('home', compact('resources'));
    }

    public function dashboard() {
        $resources = Resource::with('category')->get();
        return view('resources.dashboard', compact('resources'));
    }

    public function create() {
        $categories = Category::all();
        return view('resources.create', compact('categories'));
    }

    public function store(Request $request) {
        $path = $request->file('image')->store('resources', 'public');
        Resource::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,
            'category_id' => $request->category_id,
        ]);
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        $categories = Category::all(); // Para el selector de categoría
        return view('resources.edit', compact('resource', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // imagen opcional
        ]);

        // Si se sube nueva imagen
        if ($request->hasFile('image')) {
            // Borrar imagen anterior si existe
            if ($resource->image_path && Storage::disk('public')->exists($resource->image_path)) {
                Storage::disk('public')->delete($resource->image_path);
            }

            // Guardar nueva imagen
            $path = $request->file('image')->store('resources', 'public');
            $resource->image_path = $path;
        }

        // Actualizar campos
        $resource->title = $validated['title'];
        $resource->description = $validated['description'];
        $resource->category_id = $validated['category_id'];

        $resource->save();

        return redirect('/dashboard');
    }


    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);

        // Eliminar imagen si existe
        if ($resource->image_path && Storage::exists($resource->image_path)) {
            Storage::delete($resource->image_path);
        }

        $resource->delete();

        return redirect('/dashboard');
    }
}
