<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recursos Educativos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-blue-600 text-white p-4 flex justify-between">
        <div><a href="/" class="font-bold">Inicio</a></div>
        <div class="space-x-4">
            <a href="/dashboard">Dashboard</a>
            <a href="/categories">Categorías</a>
            <a href="/resources/create">Crear Recurso</a>
            <a href="/categories/create">Crear Categoría</a>
        </div>
    </nav>
    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
