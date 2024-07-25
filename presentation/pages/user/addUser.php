<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Tailwind CSS</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <?php include ('../../components/navigation.php'); ?>

    <div class="container mx-auto max-w-md py-8">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Ingresar Usuario</h1>
        </div>
            <form  id="usuarioForm"  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                    <label for="Cedula" class="block text-gray-700 text-sm font-bold mb-2">cedula :</label>
                    <input type="text" id="cedula" name="cedula" placeholder="Ingrese su cedula"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="firstName" class="block text-gray-700 text-sm font-bold mb-2">Nombre :</label>
                    <input type="text" id="firstName" name="firstName" placeholder="Ingrese su nombre"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="lastName" class="block text-gray-700 text-sm font-bold mb-2">arroba :</label>
                    <input type="text" id="lastName" name="lastName" placeholder="Ingrese su apellido"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">email :</label>
                    <input type="text" id="email" name="email" placeholder="Ingrese su correo"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">contraseña :</label>
                    <input type="password" id="password" name="password" placeholder="Ingrese su contraseña"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">telefono :</label>
                    <input type="text" id="telefono" name="telefono" placeholder="Ingrese su telefono"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                
                <div class="mb-4">
                <label for="perfil" class="block text-gray-700 text-sm font-bold mb-2">Tipo de Cuenta:</label>
                <select id="perfil" name="perfil" class="input-field" required>
                    <option value="cliente">Cliente</option>
                    <option value="administrador">Administrador</option>
                </select>
            </div>
                
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ingresar</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="../../scripts/user/add-user.js"></script>
</html>