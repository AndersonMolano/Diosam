function mostrarMapa(direccion) {
    // Obtiene las coordenadas de la dirección
    var coordenadas = obtenerCoordenadas(direccion);
  
    // Crea un mapa con las coordenadas obtenidas
    var mapa = new google.maps.Map(document.getElementById("mapa"), {
      center: coordenadas,
      zoom: 16
    });
  
    // Agrega un marcador al mapa en la ubicación obtenida
    var marcador = new google.maps.Marker({
      position: coordenadas,
      map: mapa
    });
  }
  function obtenerCoordenadas(direccion) {
    // Crea una solicitud HTTP
    var xhr = new XMLHttpRequest();
  
    // Establece la URL de la solicitud
    xhr.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?address=" + direccion + "&key=YOUR_API_KEY");
  
    // Inicia la solicitud
    xhr.send();
  
    // Obtiene la respuesta de la solicitud
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Decodifica la respuesta JSON
        var respuesta = JSON.parse(xhr.responseText);
  
        // Obtiene las coordenadas de la respuesta
        var coordenadas = respuesta.results[0].geometry.location;
  
        // Devuelve las coordenadas
        return coordenadas;
      } else {
        // Devuelve un valor nulo
        return null;
      }
    };
  }
  