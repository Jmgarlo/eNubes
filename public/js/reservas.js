$(document).ready(function() {
    $.ajax({
        url: '/habitaciones/listado',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            
            renderRooms(response.habitaciones);
        },
        error: function (xhr,status,error) {
            console.log(xhr,status,error);
            $('#room-list').html('<p>Error al cargar las habitaciones.</p>');
        }
    });

    const checkDates = () => {
        const fechaInicio = $('#fecha_inicio').val();
        const fechaFin = $('#fecha_fin').val();

        // Habilita los botones solo si ambos campos de fecha tienen valor
        if (fechaInicio && fechaFin) {
            $('.reserveBtn').prop('disabled', false);
        } else {
            $('.reserveBtn').prop('disabled', true);
        }
    }

    // Escucha cambios en los inputs de fecha
    $('#fecha_inicio, #fecha_fin').on('change', function() {
        checkDates(); // Verifica si las fechas están seleccionadas
    });

    // Verificación inicial (en caso de que las fechas ya estén rellenas)

    
    $('#reservation-filters').on('submit', function(e) {
        e.preventDefault();
    
        let formData = $(this).serialize();
        console.log(formData);
        

        $.ajax({
            url: '/habitaciones/listado',
            type: 'GET',
            data: formData,
            dataType: 'json',
            success: function(response) {
                console.log(response);
                
                renderRooms(response.habitaciones);
            },
            error: function(xhr, status, error) {
                console.log(xhr,status,error);
                
                $('#room-list').html('<p>Error al cargar las habitaciones.</p>');
            }
        });
        
    });

    $(document).on('click', '.reserveBtn', function() {

        console.log("Botón de reserva clickeado");
        
        let formData = {
            'id_habitacion': $(this).attr('id'),
            'fecha_inicio': $("#fecha_inicio").val(),
            'fecha_fin': $("#fecha_fin").val(),
        };
        console.log(formData);
        
        $.ajax({
            url: '/reservar/resumen',
            type: 'GET',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Redirigir a la vista de confirmación
                    window.location.replace('/reservas');
                }
            },
            error: function(xhr, status, error) {
                alert('Error al realizar la reserva. Inténtalo de nuevo.');
            }
        });
        
    });

    $('#payment-simulation-form').on('submit', function (e) {
        e.preventDefault();
        
        const cardName = $('#card-name').val();
        const cardNumber = $('#card-number').val();
        const cardExpiry = $('#card-expiry').val();
        const cardCvc = $('#card-cvc').val();
        
        setTimeout(() => {
            $('#payment-result').html(`
                <div class="alert alert-success" role="alert">
                    ¡Pago simulado exitosamente!<br>
                    Número de tarjeta: ${cardNumber}<br>
                    Fecha de expiración: ${cardExpiry}<br>
                    CVC: ${cardCvc}<br>
                    Gracias por tu reserva.
                </div>
            `);
        }, 1000);
    });

    renderRooms = (habitaciones) => {
        console.log(habitaciones);
        
        const roomList = $('.room-card-list');
        roomList.empty();
    
        if (habitaciones.length === 0) {
            roomList.html('<p>No hay habitaciones disponibles.</p>');
            return;
        }
    
        habitaciones.forEach(habitacion => {
            if(habitacion.disponibilidad == 0) {
                habitacion.disponibilidad = false
            } else {
                habitacion.disponibilidad = true
            }
            const roomCard = `
                <div class="room-card mb-3 border">
                    <div class="row g-0">
                        <div class="col-12 col-md-4">
                            <img src="/img/${habitacion.tipo}/${habitacion.id}/1.png" class="img-fluid room-image" alt="Habitación ${habitacion.nombre}" onerror="this.onerror=null; this.src='/img/default-room.png';">
                        </div>
                        <div class="col-12 col-md-8 d-flex align-items-center justify-content-between">
                            <div class="card-body text-center">
                                <h5 class="card-title">${habitacion.nombre}</h5>
                                <p class="card-text">Camas: ${habitacion.camas}</p>
                                <p class="card-text">Baños: ${habitacion.baños}</p>
                                <p class="card-text">Precio: $${habitacion.precio} / noche</p>
                                <p class="card-text ${habitacion.disponibilidad ? 'text-success' : 'text-danger'}">${habitacion.disponibilidad ? 'Disponible' : 'No disponible'}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center justify-content-md-end me-3">
                                <button class="btn btn-dark reserveBtn" id="${habitacion.id}" disabled >Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            roomList.append(roomCard);
        });
    }    
});