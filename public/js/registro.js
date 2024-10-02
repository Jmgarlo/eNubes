$(document).ready(function () {
  const handleRegistration = () => {
    $("#registerForm").on("submit", function (e) {
      e.preventDefault();

      $(".error-message").text("");

      let email = $("#email").val().trim();
      let nombre = $("#nombre").val().trim();
      let apellido1 = $("#apellido1").val().trim();
      let apellido2 = $("#apellido2").val().trim();
      let password = $("#password").val().trim();
      let confirmPassword = $("#confirm_password").val().trim();
      let formValid = true;

      if (!nombre) {
        $("#nombre-error").text("Por favor, ingresa tu nombre.");
        formValid = false;
      }

      if (!apellido1) {
        $("#apellido1-error").text("Por favor, ingresa tu primer apellido.");
        formValid = false;
      }

      if (!apellido2) {
        $("#apellido2-error").text("Por favor, ingresa tu segundo apellido.");
        formValid = false;
      }

      if (!validateEmail(email)) {
        $("#email-error").text(
          "Por favor, ingresa un correo electrónico válido."
        );
        formValid = false;
      }

      if (!password) {
        $("#password-error").text(
          "Debes escribir una contraseña de al menos 12 caracteres, una mayúscula, una minúscula y un símbolo"
        );
        formValid = false;
      }

      const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/;
      if (!passwordRegex.test(password)) {
        $("#password-error").text(
          "La contraseña debe tener al menos 12 caracteres, una mayúscula, una minúscula y un símbolo."
        );
        formValid = false;
      }

      if (password !== confirmPassword) {
        $("#confirm-password-error").text("Las contraseñas no coinciden.");
        formValid = false;
      }

      if (formValid) {
        let formData = $(this).serialize();

        $.ajax({
          url: "/validregister",
          type: "POST",
          data: formData,
          success: (response) => {
            console.log(response);

            if (response.success) {
              $("#registerMessage").html(
                '<div class="alert alert-success">' +
                  response.message +
                  "</div>"
              );
              $("#registerForm")[0].reset();
              window.location.replace(response.redirect);
            } else {
              $("#registerMessage").html(
                '<div class="alert alert-danger">' + response.message + "</div>"
              );
            }
          },
          error: function (xhr, status, error) {
            console.log(xhr, status, error);

            $("#registerMessage").html(
              '<div class="alert alert-danger">Error en el servidor. Inténtalo de nuevo más tarde.</div>'
            );
          },
        });
      }
    });
  };
  handleRegistration();
});
