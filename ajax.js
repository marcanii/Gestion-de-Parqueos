
    var contenido = document.getElementById("contenido");
    //var btnReservar = document.getElementById("btnReservar");

    function cargarContenido(url) {
        // carga el contenido de una página en el lugar donde están los datos
        fetch(url)
            .then(response => response.text())
            .then(data => contenido.innerHTML = data);
    }

    btnReservar.addEventListener("click", function () {
        console.log("Reserva realizada con éxito");
        alert("Reserva realizada con éxito");
        cargarContenido("formreserva.html");
    });

    function autenticar() {
        alert("entroform");
        var formulario = document.getElementById("formLogin");
        var parametros = new FormData(formulario);
        var ajax = new XMLHttpRequest();
    
        ajax.open('POST', 'autenticar.php', true);
        ajax.onreadystatechange = function () {
            if (ajax.readyState == 4 && ajax.status == 200) {
                var respuesta = JSON.parse(ajax.responseText);
                if (respuesta.success) {
                    window.location = "inicio.html";
                } else {
                    window.location = "errorautenticacion.php";
                }
            }
        };
        ajax.send(parametros);
    }
    