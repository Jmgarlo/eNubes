import { lang, tradReservas } from './config.js';

$(document).ready(function () {
  $.ajax({
    url: "/habitaciones/listado",
    type: "GET",
    dataType: "json",
    success: function (response) {
      console.log(response);
      renderRooms(response.habitaciones);
    },
    error: function (xhr, status, error) {
      console.log(xhr, status, error);
      $("#room-list").html(`<p>${tradReservas[lang].errorLoadingRooms}</p>`);
    },
  });

  const checkDates = () => {
    const fechaInicioVal = $("#fecha_inicio").val();
    const fechaFinVal = $("#fecha_fin").val();

    if (fechaInicioVal && fechaFinVal) {
      const today = new Date();
      today.setHours(0, 0, 0, 0);

      const fechaInicio = new Date(fechaInicioVal);
      const fechaFin = new Date(fechaFinVal);

      if (fechaInicio < today || fechaFin < today) {
        alert(tradReservas[lang].dateError);
        $(".reserveBtn").prop("disabled", true);
        return;
      }

      $(".reserveBtn").prop("disabled", false);
    } else {
      $(".reserveBtn").prop("disabled", true);
    }
  };

  $("#fecha_inicio, #fecha_fin").on("change", function () {
    checkDates();
  });

  $("#reservation-filters").on("submit", function (e) {
    e.preventDefault();

    let formData = $(this).serialize();
    console.log(formData);

    $.ajax({
      url: "/habitaciones/listado",
      type: "GET",
      data: formData,
      dataType: "json",
      success: function (response) {
        console.log(response);
        renderRooms(response.habitaciones);
      },
      error: function (xhr, status, error) {
        console.log(xhr, status, error);
        $("#room-list").html(`<p>${tradReservas[lang].errorLoadingRooms}</p>`);
      },
    });
  });

  $(document).on("click", ".reserveBtn", function () {
    console.log("Botón de reserva clickeado");

    let formData = {
      id_habitacion: $(this).attr("id"),
      fecha_inicio: $("#fecha_inicio").val(),
      fecha_fin: $("#fecha_fin").val(),
    };

    $.ajax({
      url: "/reservas/resumen",
      type: "GET",
      data: formData,
      success: function (response) {
        if (response.success) {
          console.log("valido");
          window.location.replace("/reservas/confirmacion");
        } else {
          alert(tradReservas[lang].reservationError);
        }
      },
      error: function (xhr, status, error) {
        alert(tradReservas[lang].reservationError);
      },
    });
  });

  $("#payment-simulation-form").on("submit", function (e) {
    e.preventDefault();

    const cardName = $("#card-name").val();
    const cardNumber = $("#card-number").val();
    const cardExpiry = $("#card-expiry").val();
    const cardCvc = $("#card-cvc").val();

    const success = Math.random() > 0.1;
    console.log(success);
    let id_estado = 0;
    if (success) {
      id_estado = 2;
    } else {
      id_estado = 1;
    }

    let formData = {
      cardNumber: cardNumber,
      id_estado: id_estado,
    };
    console.log(formData);

    $.ajax({
      url: "/reservas/pago",
      type: "POST",
      data: formData,
      success: function (response) {
        if (success) {
          $("#payment-result").html(`
            <div class="alert alert-success" role="alert">
                ${tradReservas[lang].paymentSuccess}
            </div>
          `);
          setTimeout(() => {
            window.location.replace("/perfil");
          }, 3000);
        } else {
          $("#payment-result").html(`
            <div class="alert alert-danger" role="alert">
                ${tradReservas[lang].paymentFailure}
            </div>
          `);
          setTimeout(() => {
            window.location.replace("/perfil");
          }, 3000);
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr, status, error);
        alert(tradReservas[lang].paymentServerError);
      },
    });
  });

  renderRooms = (habitaciones) => {
    console.log(habitaciones);

    const roomList = $(".room-card-list");
    roomList.empty();

    if (habitaciones.length === 0) {
      roomList.html(`<p>${tradReservas[lang].noRoomsAvailable}</p>`);
      return;
    }

    habitaciones.forEach((habitacion) => {
      if (habitacion.disponibilidad == 0) {
        habitacion.disponibilidad = false;
      } else {
        habitacion.disponibilidad = true;
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
                                <p class="card-text ${habitacion.disponibilidad ? "text-success" : "text-danger"}">${habitacion.disponibilidad ? "Disponible" : "No disponible"}</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-center justify-content-md-end me-3">
                                <button class="btn btn-dark reserveBtn" id="${habitacion.id}" disabled>Reservar</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
      roomList.append(roomCard);
    });
    checkDates();
  };
});
