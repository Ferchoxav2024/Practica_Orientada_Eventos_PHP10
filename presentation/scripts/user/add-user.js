
const usuarioForm = document.getElementById('usuarioForm');
usuarioForm.addEventListener('submit', (event) => {
    event.preventDefault();
    agregarUsuario(event);
    });

async function agregarUsuario(event) {
    const cedula = document.getElementById('cedula').value;
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const telefono = document.getElementById('telefono').value;
    const perfil = document.getElementById('perfil').value;


    const formData = new FormData();
    formData.append('cedula', cedula);
    formData.append('firstName', firstName);
    formData.append('lastName', lastName);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('telefono', telefono);
    formData.append('perfil', perfil);

    console.log(formData);
    try {
        const response = await fetch('http://localhost/Practica_Orientada_Eventos_PHP10/businessLogic/swUser.php', {
            method: 'POST',
            body: formData
        });
    } catch (error) {
        console.error('Error al registrar categoría:', error);
    }
}
