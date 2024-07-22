<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Cliente</title>
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include('../../components/navigationCliente.php');?>

    <div class="container mx-auto max-w-md py-8">
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Perfil del Cliente</h1>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Cédula:</label>
                <p><?php echo $user['cedula']; ?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <p><?php echo $user['firstName']; ?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <p><?php echo $user['lastName']; ?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <p><?php echo $user['email']; ?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                <p><?php echo $user['telefono']; ?></p>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Perfil:</label>
                <p><?php echo $user['perfil']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
