function loadView(viewUrl) {
  fetch(viewUrl)
  .then((response) => {
    console.log(response)
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then((data) => {
      document.getElementById('contenido').innerHTML = data;
      // Cambiar la URL en la barra de direcciones
      history.pushState({}, '', viewUrl);
    })
    .catch((error) => {
      console.error('There has been a problem with your fetch operation:',error);
    });
  }