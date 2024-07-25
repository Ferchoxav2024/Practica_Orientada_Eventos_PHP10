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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                // Aquí puedes hacer un bucle para mostrar productos desde la base de datos
                $productos = [
                    ['nombre' => 'Producto 1', 'descripcion' => 'Descripción del producto 1', 'precio' => '10.00'],
                    ['nombre' => 'Producto 2', 'descripcion' => 'Descripción del producto 2', 'precio' => '15.00'],
                    ['nombre' => 'Producto 3', 'descripcion' => 'Descripción del producto 3', 'precio' => '20.00']
                ];
                foreach ($productos as $producto) {
                    echo '<div class="bg-white text-black p-6 rounded-lg shadow-md transition transform hover:scale-105">';
                    echo '<h3 class="text-2xl font-bold mb-4">' . $producto['nombre'] . '</h3>';
                    echo '<p class="mb-4">' . $producto['descripcion'] . '</p>';
                    echo '<p class="font-bold mb-4">$' . $producto['precio'] . '</p>';
                    echo '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar al Carrito</button>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Sección de información -->
    <section class="relative bg-cover bg-center py-16" style="background-image: url('../../styles/img/Pie.jpeg');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 container mx-auto text-white text-center">
            <h2 class="text-4xl font-bold mb-8">Información del Restaurante</h2>
            <p class="text-2xl mb-4">Nombre del Restaurante: Carne al Fuego</p>
            <p class="text-xl mb-4">Redes Sociales: Facebook, Instagram, Twitter</p>
            <p class="text-xl mb-4">Teléfono: +123 456 7890</p>
            <p class="text-xl mb-4">Horarios: Lunes a Domingo - 10:00 AM a 10:00 PM</p>
        </div>
    </section>
</body>
</html>
