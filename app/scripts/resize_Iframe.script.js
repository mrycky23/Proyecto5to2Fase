function resizeIframe() {
    var iframe = document.getElementById('content');
    if (iframe) {
        var body = iframe.contentWindow.document.body;
        var html = iframe.contentWindow.document.documentElement;
        
        // Calcula la altura total del contenido
        var height = Math.max(body.scrollHeight, body.offsetHeight, 
                              html.clientHeight, html.scrollHeight, html.offsetHeight);
        
        iframe.style.height = height + 'px'; // Ajusta la altura del iframe
    }
}

window.addEventListener('load', function() {
    var iframe = document.getElementById('content');
    if (iframe) {
        iframe.onload = resizeIframe; // Llama a resizeIframe cuando el iframe carga
    }
});

