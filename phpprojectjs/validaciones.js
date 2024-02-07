function validarFormulario() {
    var nombre = document.getElementById('nombre').value;
    var apellido = document.getElementById('apellido').value;

    var errorNombre = document.getElementById('errorNombre');
    var errorApellido = document.getElementById('errorApellido');

    errorNombre.innerHTML = '';
    errorApellido.innerHTML = '';

    var letras = /^[A-Za-z]+$/;

    if (nombre.trim() === '') {
        errorNombre.innerHTML = 'El campo Nombre no puede estar vacío.';
        return false;
    } else if (!nombre.match(letras)) {
        errorNombre.innerHTML = 'El nombre debe contener solo letras.';
        return false;
    }

    if (apellido.trim() === '') {
        errorApellido.innerHTML = 'El campo Apellido no puede estar vacío.';
        return false;
    } else if (!apellido.match(letras)) {
        errorApellido.innerHTML = 'El apellido debe contener solo letras.';
        return false;
    }

    return true;
}
