<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro y Lista de Productos</title>
    <!-- Incluir Tailwind CSS -->
    <link rel="stylesheet" href="../.././styles/tailwind.css"> <!-- Asegúrate de que este enlace apunte correctamente a Tailwind CSS -->
    <script src="../../scripts/producto/add-producto.js"></script>
</head>
<body>
<div class="max-w-4xl mx-auto py-12 sm:px-6 lg:px-8 text-[#191d20] space-y-8">
    <div  class="bg-white rounded-lg overflow-hidden shadow-md">
            <div class="bg-[#191d20] text-white rounded-t-lg p-4">
                <h2 class="text-2xl font-bold text-center">Registrar Nuevo Producto</h2>
            </div>
            <form id="productoForm" class="p-6">
                <div class="mb-4">
                    <label for="nombre" class="block text-[#191d20] font-bold mb-2">Nombre del Producto:</label>
                    <input type="text" id="nombre" name="nombre" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500"maxlength="50">
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-[#191d20] font-bold mb-2">Descripción del Producto:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500" maxlength="200"></textarea>
                </div>

                <div class="mb-4">
                    <label for="precio" class="block text-[#191d20] font-bold mb-2">Precio del Producto:</label>
                    <input type="number" step="0.01" id="precio" name="precio" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-4">
                    <label for="imagen" class="block text-[#191d20] font-bold mb-2">Imagen del Producto:</label>
                    <input type="text" id="imagen" name="imagen" accept="image/*" required class="w-full px-3 py-2 border rounded-lg text-[#2E2E2E] focus:outline-none focus:border-blue-500">
                </div>

                <div class="text-center">
                    <button type="submit" class="px-4 py-2 bg-[#ed2839] text-white rounded-lg cursor-pointer hover:bg-[#4A4A4A]">Registrar</button>
                </div>
            </form>
          
        </div>
        </div>
</body>
</html>