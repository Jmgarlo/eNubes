document.addEventListener('DOMContentLoaded', function () {
    const reservarBtn = document.getElementById('reservarBtn');
    console.log(reservarBtn)
    reservarBtn.addEventListener('click', function () {
        console.log('boton')
        // Hacer la petición AJAX para generar la habitación
        fetch('/generar-habitacion', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Habitación generada con éxito: ' + data.data.nombre);
                // Aquí puedes hacer más lógica, como actualizar el DOM, redirigir, etc.
            } else {
                alert('Error al generar la habitación');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al procesar la solicitud');
        });
    });
});