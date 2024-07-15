
const categoriaForm = document.getElementById('categoriaForm');
categoriaForm.addEventListener('submit', (event) => {
    event.preventDefault();
    agregarCategoria(event);
    });

async function agregarCategoria(event) {
    const nombre_categoria = document.getElementById('nombre_categoria').value;
    const descripcion_categoria = document.getElementById('descripcion_categoria').value;
    const imagen_categoria = document.getElementById('imagen_categoria');

    const file = imagen_categoria.files[0];

    const formData = new FormData();
    formData.append('nombre_categoria', nombre_categoria);
    formData.append('descripcion_categoria', descripcion_categoria);
    formData.append('imagen_categoria', file);

    console.log(formData);
    try {
        const response = await fetch('http://localhost/Practica_Orientada_Eventos_PHP10/businessLogic/swCategoria.php', {
            method: 'POST',
            body: formData
        });
    } catch (error) {
        console.error('Error al registrar categoría:', error);
    }
}
