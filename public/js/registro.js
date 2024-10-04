import { lang, tradRegistro } from './config.js';

$(document).ready(function () {
  const handleRegistration = () => {
    $("#registerForm").on("submit", function (e) {
      e.preventDefault();

      $(".error-message").text("");

      let nombre = $("#nombre").val().trim();
      let apellido = $("#apellido").val().trim();
      let pais = $("#pais").val().trim();
      let telefono = $("#telefono").val().trim();
      let email = $("#email").val().trim();
      let formValid = true;

      if (!nombre) {
        $("#nombre-error").text(tradRegistro[lang].enterName);
        formValid = false;
      }

      if (!apellido) {
        $("#apellido-error").text(tradRegistro[lang].enterSurname);
        formValid = false;
      }

      if (!pais) {
        $("#pais-error").text(tradRegistro[lang].enterCountry);
        formValid = false;
      }

      if (!telefono) {
        $("#telefono-error").text(tradRegistro[lang].enterPhone);
        formValid = false;
      }

      if (!validateEmail(email)) {
        $("#email-error").text(tradRegistro[lang].invalidEmail);
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
              $("#success-message").text(tradRegistro[lang].successMessage).show();
              $("#registerForm")[0].reset();
              window.location.replace(response.redirect);
            } else {
              $("#registerMessage").html('<div class="alert alert-danger">' + response.message + "</div>");
            }
          },
          error: function (xhr, status, error) {
            console.log(xhr, status, error);
            $("#registerMessage").html('<div class="alert alert-danger">' + tradRegistro[lang].serverError + '</div>');
          },
        });
      }
    });
  };

  handleRegistration();
});
