<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            scroll-behavior: smooth;
        }
        section {
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100">
    <?php include('../../components/navigationCliente.php');?>

    <!-- Sección de bienvenida -->
    <section class="relative bg-cover bg-center h-screen" style="background-image: url('../../styles/img/fondoinicio.jpeg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <div class="text-center text-white">
                <h1 class="text-5xl font-bold mb-4">Bienvenido a Carne al Fuego</h1>
                <p class="text-2xl">Donde cada bocado es una experiencia única</p>
            </div>
        </div>
    </section>

    <!-- Sección de productos -->
    <section class="relative bg-cover bg-center py-16" style="background-image: url('../../styles/img/fondoproduc.jpeg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 container mx-auto text-white">
            <h2 class="text-4xl font-bold mb-8 text-center">Nuestros Productos</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="productos-grid">
                <!-- Productos se cargarán aquí dinámicamente -->
            </div>
        </div>
    </section>

    <!-- Ventana del carrito -->
    <div class="fixed bottom-0 right-0 m-8 bg-white rounded-lg shadow-lg p-4 z-50 max-h-96 overflow-y-auto" id="carrito" style="display: none;">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Carrito</h2>
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded" id="minimizar-carrito">Minimizar</button>
        </div>
        <div id="carrito-productos" class="space-y-4">
            <!-- Productos del carrito se cargarán aquí dinámicamente -->
        </div>
        <div class="flex justify-between items-center mt-4">
            <span class="text-xl font-bold">Total:</span>
            <span class="text-xl font-bold" id="carrito-total">$0.00</span>
        </div>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Pagar</button>
    </div>

    <!-- Botón para mostrar el carrito -->
    <button class="fixed bottom-0 right-0 m-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded z-40" id="mostrar-carrito">
        Ver Carrito
    </button>

    <script src="../../scripts/user/carrito.js"></script>
</body>
</html>
