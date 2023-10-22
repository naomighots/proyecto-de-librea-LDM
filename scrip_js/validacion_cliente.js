document.addEventListener('DOMContentLoaded', function() {
    var formulario = document.querySelector('.formulario_cliente');
    formulario.addEventListener('submit', function(event) {
    event.preventDefault();
    validarFormulario();
    });
});

function validarFormulario() {
  var nombreCliente = document.getElementById('nombre_cliente').value;
  var apellidoPaterno = document.getElementById('apellido_paterno').value;
  var apellidoMaterno = document.getElementById('apellido_materno').value;
  var rutCliente = document.getElementById('rut_cliente').value;
  var direccionCliente = document.getElementById('direccion_cliente').value;
  var telefonoCliente = document.getElementById('telefono_cliente').value;
  //validarNumero(telefonoCliente);
  resetearMensajesError();

  //validacion si los campos estan vacios
  if (nombreCliente.trim() === '') {
    mostrarError('nombre_cliente', 'Por favor, ingrese el nombre del cliente.');
    return;
  }
  if (apellidoPaterno.trim() === '') {
    mostrarError('apellido_paterno', 'Por favor, ingrese el apellido paterno del cliente.');
    return;
  }
  
  if (apellidoMaterno.trim() === '') {
    mostrarError('apellido_materno', 'Por favor, ingrese el apellido materno del cliente.');
    return;
  }
  
  if (rutCliente.trim() === '') {
    mostrarError('rut_cliente', 'Por favor, ingrese el Rut del cliente.');
    return;
  }
  
  if (direccionCliente.trim() === '') {
    mostrarError('direccion_cliente', 'Por favor, ingrese la dirección del cliente.');
    return;
  }
  if (telefonoCliente.trim() === '') {
    mostrarError('telefono_cliente', 'Por favor, ingrese el telefono del cliente.');
    return;
  }
    // Si la validación es exitosa, puedes enviar el formulario o realizar otras acciones
    // formulario.submit();
    alert('Formulario validado correctamente. Puedes enviar los datos.');
  }


function mostrarError(invalido, mensaje) {
  var campo = document.getElementById(invalido);
  campo.classList.add('invalido');
  var divError = campo.nextElementSibling;
  divError.innerText = mensaje;
  divError.style.display = 'block';
}



