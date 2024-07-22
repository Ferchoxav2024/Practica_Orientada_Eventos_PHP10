<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Cliente</title>
    <link href="../../styles/tailwind.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-center bg-cover" style="background-image: url('../../styles/img/fondo.jpg'); background-size: 40%; background-position: center;">

    <!-- Barra de navegación -->
    <?php include('../../components/navigationCliente.php');?>

    <!-- Contenido del perfil del usuario -->
    <div class="max-w-4xl mx-auto py-12 sm:px-6 lg:px-8 text-[#191d20]">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-8 text-center bg-[#191d20] text-white p-4 rounded">Perfil del Cliente</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Cédula</p>
                    <p id="cedula-value" class="text-lg bg-gray-200 p-4 rounded"><?php echo $user['cedula']; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Nombre</p>
                    <p id="firstName-value" class="text-lg bg-gray-200 p-4 rounded"><?php echo $user['firstName']; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Apellido</p>
                    <p id="lastName-value" class="text-lg bg-gray-200 p-4 rounded"><?php echo $user['lastName']; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Email</p>
                    <p id="email-value" class="text-lg bg-gray-200 p-4 rounded"><?php echo $user['email']; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Teléfono</p>
                    <p id="telefono-value" class="text-lg bg-gray-200 p-4 rounded"><?php echo $user['telefono']; ?></p>
                </div>
                <div class="bg-gray-50 p-4 rounded-lg shadow-inner">
                    <p class="text-lg font-semibold bg-blue-500 text-white p-4 rounded">Perfil</p>
                    <p id="perfil-value" class="text-lg bg-gray-200 p-4 rounded"><?php echo $user['perfil']; ?></p>
                </div>
            </div>
            <!-- Botón de eliminación -->
            <div class="mt-8 text-center">
                <form id="delete-form" method="post">
                    <button type="button" onclick="confirmDeletion()" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar Cuenta</button>
                    <input type="hidden" name="delete" value="1">
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmDeletion() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esta acción",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form').submit();
                }
            });
        }
    </script>
</body>
</html>
