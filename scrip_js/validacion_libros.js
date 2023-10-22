// Obtener el formulario y los campos de entrada
const formulario = document.getElementById('formulario_libro');
const codigo = document.getElementById('codigo');
const nombre = document.getElementById('nombre');
const autor = document.getElementById('autor');
const editorial = document.getElementById('editorial');
const categorial = document.getElementById('categoria');
const cantidad = document.getElementById('cantidad');

// Evento antes que el formulario se envie
formulario.addEventListener('submit', function(event) {
    event.preventDefault(); // se cancela el envio
    // validacion de los campos
    if (validarCampo(codigo, 1) &&
        validarCampo(nombre, 1) &&
        validarCampo(autor, 1) &&
        validarCampo(editorial, 1) &&
        validarCampo(categoria, 1) &&
        validarCampo(cantidad, 1)) {
    // si todo es correcto se envian
    formulario.submit();
    }
});

// validacion de los campos
function validarCampo(campo, longitudMinima) {
    if (campo.value.trim().length >= longitudMinima) {
        // El campo es válido
        campo.classList.remove('is-invalid');
        return true;
    } else {
    // El campo no cumple con la longitud mínima requerida
    campo.classList.add('is-invalid');
    document.getElementById(campo.id + 'Error').textContent = 'El campo es obligatorio'; // Mostrar mensaje de error
    return false;
    }
}
// validacion para que solo entren numeros en capos de codigo y cantidad
function validarCampo(campo, longitudMinima) {
    if (campo.value.trim().length >= longitudMinima) {
        if (campo === cantidad || campo == codigo && !/^[\d]+$/.test(campo.value.trim())) { 
            //se revisan si los datos corresponden a numeros
            campo.classList.add('is-invalid');
            document.getElementById('error_letra').textContent = 'Debe ingresar numeros.';
            return false;
        }
        // Si el campo es valido se envia
        campo.classList.remove('is-invalid');
        return true;
        } else {
        // debe tener as caracteres
        campo.classList.add('is-invalid');
        return false;
    }
}



