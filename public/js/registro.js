$(document).ready(function () {
  const handleRegistration = () => {
    $("#registerForm").on("submit", function (e) {
      e.preventDefault();

      // Limpiar mensajes de error previos
      $(".error-message").text("");

      // Obtener valores del formulario
      let nombre = $("#nombre").val().trim();
      let apellido = $("#apellido").val().trim();
      let pais = $("#pais").val().trim();
      let telefono = $("#telefono").val().trim();
      let email = $("#email").val().trim();
      let formValid = true;

      // Validación de los campos
      if (!nombre) {
        $("#nombre-error").text("Por favor, ingresa tu nombre.");
        formValid = false;
      }

      if (!apellido) {
        $("#apellido-error").text("Por favor, ingresa tu apellido.");
        formValid = false;
      }

      if (!pais) {
        $("#pais-error").text("Por favor, ingresa tu país.");
        formValid = false;
      }

      if (!telefono) {
        $("#telefono-error").text("Por favor, ingresa tu teléfono.");
        formValid = false;
      }

      if (!validateEmail(email)) {
        $("#email-error").text("Por favor, ingresa un correo electrónico válido.");
        formValid = false;
      }

      // Solo enviar datos si el formulario es válido
      if (formValid) {
        let formData = $(this).serialize();

        $.ajax({
          url: "/validregister", // Cambia esta URL según tu configuración del backend
          type: "POST",
          data: formData,
          success: (response) => {
            console.log(response);

            if (response.success) {
              // Mostrar mensaje de éxito
              $("#success-message").text(response.message).show();
              $("#registerForm")[0].reset();
              window.location.replace(response.redirect);
            } else {
              // Mostrar mensaje de error
              $("#registerMessage").html('<div class="alert alert-danger">' + response.message + "</div>");
            }
          },
          error: function (xhr, status, error) {
            console.log(xhr, status, error);
            $("#registerMessage").html('<div class="alert alert-danger">Error en el servidor. Inténtalo de nuevo más tarde.</div>');
          },
        });
      }
    });
  };

  // Llamar a la función para manejar el registro
  handleRegistration();
});
