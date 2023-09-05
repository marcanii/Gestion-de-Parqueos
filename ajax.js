var contenido = document.getElementById("contenido");
var buttonReservar2 = document.getElementById("btnReservar2");
function cargarContenido(url) {

    //carga el contenido de una pagina en el lugar done estan los datos
    fetch(url)
        .then(response => response.text())
        .then(data => contenido.innerHTML = data);
}

function autenticar() {
    // alert("entroform");
    var formulario = document.getElementById("formLogin");
    var parametros = new FormData(formulario);
    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'autenticar.php', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            if (respuesta.success) {
                window.location = "inicio.php";
            } else {
                window.location = "errorautenticacion.php";
            }
        }
    };
    ajax.send(parametros);
}


var contenido = document.getElementById("contenido");

function editartarifa(idtarifa, tipotarifa) {
  var ajax = new XMLHttpRequest();
  ajax.open('POST', 'form_update.php', true);
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  ajax.onreadystatechange = function() {
    if (ajax.readyState == 4) {
      contenido.innerHTML = ajax.responseText;
    }
  };

  var data = 'idtarifa=' + encodeURIComponent(idtarifa) + '&tipotarifa=' + encodeURIComponent(tipotarifa);
  ajax.send(data);
}

function editarReservaProgramada(id_reserva) {
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'form_updateres.php', true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    ajax.onreadystatechange = function() {
      if (ajax.readyState == 4) {
        contenido.innerHTML = ajax.responseText;
      }
    };
  
    var data = 'id_reserva=' + encodeURIComponent(id_reserva);
    ajax.send(data);
  }

function editar1() {
    var contenido = document.getElementById("contenido");
    var formulario = document.getElementById("formEditar1");
    var parametros = new FormData(formulario);
 
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'update.php', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            contenido.innerHTML = ajax.responseText;
        }
    };
    ajax.send(parametros);
    // button.disabled = true;
    // button.style.backgroundColor = "gray";

}
function crear1() {
    var contenido = document.getElementById("contenido");
    var formulario = document.getElementById("formCrear1");
    var parametros = new FormData(formulario);
    

    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'create.php', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            contenido.innerHTML = ajax.responseText;
        }
    };
    ajax.send(parametros);
}

function eliminartarifa(idtarifa) {
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'delete.php', true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    ajax.onreadystatechange = function() {
      if (ajax.readyState == 4) {
        contenido.innerHTML = ajax.responseText;
      }
    };
  
    var data = 'idtarifa=' + encodeURIComponent(idtarifa);
    ajax.send(data);
  }

  function eliminarReserva(idparqueo) {
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'deleteReserva.php', true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    ajax.onreadystatechange = function() {
      if (ajax.readyState == 4) {
        contenido.innerHTML = ajax.responseText;
      }
    };
  
    var data = 'idparqueo=' + encodeURIComponent(idparqueo);
    ajax.send(data);
  }

  function eliminarReservaProgramada(id_reserva) {
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'deleteReservaProg.php', true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    ajax.onreadystatechange = function() {
      if (ajax.readyState == 4) {
        contenido.innerHTML = ajax.responseText;
      }
    };
  
    var data = 'id_reserva=' + encodeURIComponent(id_reserva);
    ajax.send(data);
  }
  
function reservar1(button) {
    var contenido = document.getElementById("contenido");
    var formulario = document.getElementById("formReserva1");
    var parametros = new FormData(formulario);
    
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'crearReserva1.php', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            contenido.innerHTML = ajax.responseText;
        }
    };
    ajax.send(parametros);
    button.disabled = true;
    button.style.backgroundColor = "gray";

}

function editarReservaProg3(button) {
    var contenido = document.getElementById("contenido");
    var formulario = document.getElementById("formEditar3");
    var parametros = new FormData(formulario);
    
    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'editarReservaProg.php', true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            contenido.innerHTML = ajax.responseText;
        }
    };
    ajax.send(parametros);
    button.disabled = true;
    button.style.backgroundColor = "gray";

}

function reservar2(button) {
    // buttonReservar2.disabled = true;

    const horaActual = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    
    // Calculamos la hora de salida sumando 1 hora a la hora de entrada(luego cambiamos cuando llegue el cliente)
    const horaEntrada = new Date();
    const horaSalida = new Date(horaEntrada);
    horaSalida.setHours(horaEntrada.getHours() + 1);

    // Formatea la hora de salida
    const horaSalidaFormateada = horaSalida.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    const datos = {
        // fecha: fechaActual,
        horaentrada: horaActual,
        horasalida: horaSalidaFormateada, 
    };

    var ajax = new XMLHttpRequest();
    ajax.open('POST', 'crearReserva2.php', true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4) {
            contenido.innerHTML = ajax.responseText;
        }
    };

    // Convertir el objeto de datos a una cadena de consulta
    const data = Object.keys(datos).map(key => key + '=' + encodeURIComponent(datos[key])).join('&');
    ajax.send(data);
    // button.disabled = true;
    // button.style.backgroundColor = "gray";
    // buttonReservar2.disabled = true;
    // buttonReservar2.style.backgroundColor = "gray";
}
