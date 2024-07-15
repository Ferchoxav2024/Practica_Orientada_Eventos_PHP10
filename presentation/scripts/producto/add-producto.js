
const productoForm = document.getElementById('productoForm');
productoForm.addEventListener('submit', (event) => {
    event.preventDefault();
    agregarProducto(event);
});

async function agregarProducto(event) {
    const nombre = document.getElementById('nombre').value;
    const descripcion = document.getElementById('descripcion').value;
    const precio = document.getElementById('precio').value;
    const imagen = document.getElementById('imagen').value;
    const categoriaId = document.querySelector('input[name="categoria_id"]').value;
    const formData = new FormData();
    
    formData.append('nombre', nombre);
    formData.append('descripcion', descripcion);
    formData.append('precio', precio);
    formData.append('imagen', imagen);
    formData.append('categoria_id', categoriaId);
    
    try {
        const response = await fetch('http://localhost/Practica_Orientada_Eventos_PHP10/businessLogic/swProductos.php', {
            method: 'POST',
            body: formData
        });
    } catch (error) {
        console.error('Error al agregar producto:', error);
    }
}
