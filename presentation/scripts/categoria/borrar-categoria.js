const categoriaForm = document.getElementById('categoriaForm');
categoriaForm.addEventListener('submit', (event) => {
    event.preventDefault();
    eliminarCategoria(event);
    });

async function eliminarCategoria(idCategoria) {
    const nombre_categoria = document.getElementById('nombre_categoria').value;
    const descripcion_categoria = document.getElementById('descripcion_categoria').value;
    const imagen_categoria = document.getElementById('imagen_categoria').value;

   
    const formData = new FormData(idCategoria);
    formData.append('nombre_categoria', nombre_categoria);
    formData.append('descripcion_categoria', descripcion_categoria);
    formData.append('imagen_categoria', imagen_categoria);
    try {
        const response = await fetch('http://localhost/Practica_Orientada_Eventos_PHP10/businessLogic/swCategoria.php?id=${idCategoria}', {
            method: 'DELETE',
            body: formData
        });
    } catch (error) {
        console.error('Error al registrar categoría:', error);
    }
}
