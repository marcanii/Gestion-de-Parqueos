var contenido = document.getElementById("contenido");

function cargarContenido(url) {

    //carga el contenido de una pagina en el lugar done estan los datos
    fetch(url)
        .then(response => response.text())
        .then(data => contenido.innerHTML = data);
}