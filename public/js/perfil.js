$(document).ready(function () {

    $('#edit-profile-btn').click(function () {
        $('#profile-view').hide();
        $('#edit-profile-view').show();
    });

    $('#cancel-edit-btn').click(function () {
        $('#edit-profile-view').hide();
        $('#profile-view').show();
    });


    $('#editProfileForm').on('submit', function (e) {
        e.preventDefault();
        $('.error-message').text('');

        let nombre = $("#nombre").val().trim();
        let apellido = $("#apellido").val().trim();
        let pais = $("#pais").val().trim();
        let telefono = $("#telefono").val().trim();
        let email = $("#email").val().trim();
        let password = $("#password").val().trim();
        let formValid = true;

        if (!nombre) {
            $('.error-message').text("Por favor, ingresa tu nombre.");
            formValid = false;
        }

        if (!apellido) {
            $('.error-message').text("Por favor, ingresa tu apellido.");
            formValid = false;
        }

        if (!validateEmail(email)) {
            $('.error-message').text("Por favor, ingresa un correo electrónico válido.");
            formValid = false;
        }

        if (!pais) {
            $('.error-message').text("Por favor, ingresa tu país.");
            formValid = false;
        }

        if (!telefono) {
            $('.error-message').text("Por favor, ingresa tu teléfono.");
            formValid = false;
        }

        if (!password) {
            $('.error-message').text('Debes escribir una contraseña de al menos 12 caracteres, una mayúscula, una minúscula y un símbolo');
            formValid = false;
        }
        
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/;
        if (!passwordRegex.test(password)) {
            $('.error-message').text('La contraseña debe tener al menos 12 caracteres, una mayúscula, una minúscula y un símbolo.');
            formValid = false;
        }

        if (formValid) {
            let formData = $(this).serialize();

            $.ajax({
                url: '/perfil/update',
                type: 'POST',
                data: formData,
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        $('#edit-profile-view').hide();
                        $('#profile-view').show();
                        window.location.replace(response.redirect);
                    } else {
                        $('.error-message').text(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    $('.error-message').text("Error en el servidor. Inténtalo de nuevo más tarde.");
                },
            });
        }
    });

    $('#delete-account-btn').click(function () {
        if (confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.')) {
            $.ajax({
                url: '/perfil/delete',
                type: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.href = '/';
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert("Error en el servidor. Inténtalo de nuevo más tarde.");
                }
            });
        }
    });
});