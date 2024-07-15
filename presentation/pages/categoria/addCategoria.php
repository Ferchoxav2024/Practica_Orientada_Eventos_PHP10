<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro categoria</title>
    <!-- Incluir Tailwind CSS -->
    <link rel="stylesheet" href="../../styles/tailwind.css">

</head>
<body>
<div class="flex justify-center items-center min-h-screen">
        <div class="max-w-md bg-white rounded-lg overflow-hidden shadow-md mx-auto">
            <h2 class="text-2xl font-bold text-center p-4 bg-[#191d20] text-white">Registro de Nueva Categoría</h2>
            <form  id="categoriaForm"  class="p-4">
                <div class="mb-4">
                    <label for="nombre" class="block text-[#191d20] font-bold mb-2">Nombre de la Categoría:</label>
                    <input type="text" id="nombre_categoria" name="nombre_categoria" placeholder="ingrese la categoria"  class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></input>
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-[#191d20] font-bold mb-2">Descripción de la Categoría:</label>
                    <input type="text" id="descripcion_categoria" name="descripcion_categoria" placeholder="descripcion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></input>
                </div>

                <div class="mb-4">
                    <label for="imagen" class="block text-[#191d20] font-bold mb-2">Imagen de la Categoría:</label>
                    <input type="text" id="imagen_categoria" name="imagen_categoria"   class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></input>
                </div>

                <div class="text-center">
                    <button type="submit" class="px-4 py-2 bg-[#ed2839] text-white rounded-lg cursor-pointer hover:bg-[#642226]">REGISTRAR CATEGORIA</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="../../scripts/categoria/add-categoria.js"></script>
</html>