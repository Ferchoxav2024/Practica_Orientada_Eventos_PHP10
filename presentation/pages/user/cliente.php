<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include('../../components/navigationCliente.php');?>

    <div class="container mx-auto max-w-md py-8">
        <div class="flex items-center justify-between mb-4 text-justify">
            <h1 class="text-3xl font-bold text-gray-800">Bienvenido, Cliente</h1>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <button onclick="window.location.href='perfilCliente.php'" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Ver Perfil
            </button>
        </div>
    </div>
</body>
</html>
