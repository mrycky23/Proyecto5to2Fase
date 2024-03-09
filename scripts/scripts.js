function loadView(viewUrl, pageTitle) {
  if (viewUrl.startsWith('.')) {
    viewUrl = viewUrl.substring(1);
  }

  fetch(viewUrl)
    .then((response) => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then((data) => {
      document.getElementById('content').innerHTML = data;
      // Cambiar la URL en la barra de direcciones
      history.pushState({ page: pageTitle }, pageTitle, viewUrl);
    })
    .catch((error) => {
      console.error(
        'There has been a problem with your fetch operation:',
        error
      );
    });
}
