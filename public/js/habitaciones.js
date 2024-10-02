$(document).ready(function () {
  let habitaciones = []; // Arreglo para guardar las habitaciones obtenidas
  let currentIndex = 0; // Índice de la imagen actual en el carrusel
  const getRooms = () => {
    $.ajax({
      url: "/geHabitaciones",
      type: "GET",
      dataType: "json",
      success: function (data) {
        console.log(data);

        // Guardar las habitaciones
        habitaciones = [
          ...data.individuales,
          ...data.dobles,
          ...data.suites,
          ...data.lujo,
        ];
        console.log(habitaciones);

        // Mostrar la primera habitación e imagen
        if (habitaciones.length > 0) {
          updateCarousel();
        }
      },
      error: function (xhr, status, error) {
        console.error("Error al obtener habitaciones:", error);
      },
    });
  };

  const updateCarousel = () => {
    const habitacion = habitaciones[currentIndex];
    const firstImageUrl = habitacion.url_foto; // Usar la primera foto de cada habitación
    console.log($('#room-name').text());
    
    $('#room-name').text(habitacion.nombre);
    $('#room-description').text(habitacion.descripcion);
    $("#room-image").attr("src", `/${firstImageUrl}`);
  };

  // Navegar hacia la izquierda (previo)
  $("#prev-room").on("click", function () {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = habitaciones.length - 1; // Si está en el inicio, ir al final
    }
    updateCarousel();
  });

  // Navegar hacia la derecha (siguiente)
  $("#next-room").on("click", function () {
    if (currentIndex < habitaciones.length - 1) {
      currentIndex++;
    } else {
      currentIndex = 0; // Si está al final, ir al inicio
    }
    updateCarousel();
  });

  getRooms();
});
