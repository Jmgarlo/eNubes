import { lang, tradHabitaciones } from './config.js';

$(document).ready(function () {
  let habitaciones = [];
  let currentIndex = 0;

  const getRooms = () => {
    $.ajax({
      url: "/geHabitaciones",
      type: "GET",
      dataType: "json",
      success: function (data) {
        console.log(data);

        habitaciones = [
          ...data.individuales,
          ...data.dobles,
          ...data.suites,
          ...data.lujo,
        ];
        console.log(habitaciones);

        if (habitaciones.length > 0) {
          updateCarousel();
        } else {
          alert(tradHabitaciones[lang].noRoomsAvailable);
        }
      },
      error: function (xhr, status, error) {
        console.error(tradHabitaciones[lang].fetchingError, error);
      },
    });
  };

  const updateCarousel = () => {
    const habitacion = habitaciones[currentIndex];
    const firstImageUrl = habitacion.url_foto;
    
    $('#room-name').text(habitacion.nombre);
    $('#room-description').text(habitacion.descripcion);
    $("#room-image").attr("src", `/${firstImageUrl}`);
  };

  $("#prev-room").on("click", function () {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = habitaciones.length - 1;
    }
    updateCarousel();
  });

  $("#next-room").on("click", function () {
    if (currentIndex < habitaciones.length - 1) {
      currentIndex++;
    } else {
      currentIndex = 0;
    }
    updateCarousel();
  });

  getRooms();
});
