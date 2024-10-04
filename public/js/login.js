import { lang, tradLogin } from './config.js';

$(document).ready(function () {
  const handleLogin = () => {
    $("#loginForm").on("submit", function (e) {
      e.preventDefault();

      $(".error-message").text("");

      let email = $("#email").val().trim();
      let password = $("#password").val().trim();
      let formValid = true;

      if (!email) {
        $("#email-error").text(tradLogin[lang].emailEmpty);
        formValid = false;
      } else if (!validateEmail(email)) {
        $("#email-error").text(tradLogin[lang].emailInvalid);
        formValid = false;
      }

      if (!password) {
        $("#password-error").text(tradLogin[lang].passwordEmpty);
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
              '<div class="alert alert-danger">' + tradLogin[lang].serverError + "</div>"
            );
          },
        });
      }
    });
  };
  handleLogin();
});
