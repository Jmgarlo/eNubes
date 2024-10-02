$(document).ready(function () {
  const handleLogin = () => {
    $("#loginForm").on("submit", function (e) {
      e.preventDefault();

      $(".error-message").text("");

      let email = $("#email").val().trim();
      let password = $("#password").val().trim();
      let formValid = true;

      if (!email) {
        $("#email-error").text(
          "El campo de correo electrónico no puede estar vacío."
        );
        formValid = false;
      } else if (!validateEmail(email)) {
        $("#email-error").text(
          "Por favor, ingresa un correo electrónico válido."
        );
        formValid = false;
      }

      if (!password) {
        $("#password-error").text(
          "El campo de contraseña no puede estar vacío."
        );
        formValid = false;
      }

      if (formValid) {
        let formData = $("#loginForm").serialize();

        $.ajax({
          url: "/validlogin",
          type: "POST",
          data: formData,
          success: (response) => {
            if (response.success) {
              $("#loginMessage").html(
                '<div class="alert alert-success">' +
                  response.message +
                  "</div>"
              );
              window.location.replace(response.redirect);
            } else {
              $("#loginMessage").html(
                '<div class="alert alert-danger">' + response.message + "</div>"
              );
            }
          },
          error: function (xhr, status, error) {
            $("#loginMessage").html(
              '<div class="alert alert-danger">Error en el servidor. Inténtalo de nuevo más tarde.</div>'
            );
          },
        });
      }
    });
  };
  handleLogin();
});
