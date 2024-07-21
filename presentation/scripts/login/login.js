const loginForm = document.getElementById('loginForm');
loginForm.addEventListener('submit', (event) => {
    event.preventDefault();
    loginUser(event);
});

async function loginUser(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const formData = new FormData();
    formData.append('email', email);
    formData.append('password', password);

    try {
        const response = await fetch('http://localhost/Practica_Orientada_Eventos_PHP10/businessLogic/swLogin.php', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();
        if (result.success) {
            window.location.href = result.redirect;
        } else {
            alert('Credenciales incorrectas');
        }
    } catch (error) {
        console.error('Error al iniciar sesión:', error);
    }
}
