import { lang, tradPerfil } from './config.js';

$(document).ready(function () {
    $.ajax({
        url: '/perfil/reservas',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                renderReservations(response.reservas);
            } else {
                console.error('No se encontraron reservas:', response.message);
                $(".reserva-card-list").html("<p>" + tradPerfil[lang].noReservations + "</p>");
            }
        },
        error: function (xhr, status, error) {
            console.error('Error al cargar las reservas:', xhr, status, error);
            $(".reserva-card-list").html("<p>" + tradPerfil[lang].errorLoadingReservations + "</p>");
        }
    });

    $('#edit-profile-btn').click(function () {
        $('#profile-view').hide();
        $('#edit-profile-view').show();
    });

    $('#cancel-edit-btn').click(function () {
        $('#edit-profile-view').hide();
        $('#profile-view').show();
    });

    $('#editProfileForm').on('submit', function (e) {
        if (!isLoggedIn) {
            window.location.replace('/login');
        }
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
            $('.error-message').text(tradPerfil[lang].enterName);
            formValid = false;
        }

        if (!apellido) {
            $('.error-message').text(tradPerfil[lang].enterSurname);
            formValid = false;
        }

        if (!validateEmail(email)) {
            $('.error-message').text(tradPerfil[lang].invalidEmail);
            formValid = false;
        }

        if (!pais) {
            $('.error-message').text(tradPerfil[lang].enterCountry);
            formValid = false;
        }

        if (!telefono) {
            $('.error-message').text(tradPerfil[lang].enterPhone);
            formValid = false;
        }

        if (!password) {
            $('.error-message').text(tradPerfil[lang].enterPassword);
            formValid = false;
        }
        
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{12,}$/;
        if (!passwordRegex.test(password)) {
            $('.error-message').text(tradPerfil[lang].invalidPassword);
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
                    $('.error-message').text(tradPerfil[lang].serverError);
                },
            });
        }
    });

    $('#delete-account-btn').click(function () {
        if (confirm(tradPerfil[lang].confirmDeleteAccount)) {
            $.ajax({
                url: '/perfil/delete',
                type: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        window.location.replace('/');
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    alert(tradPerfil[lang].serverError);
                }
            });
        }
    });

    $(document).on("click", ".detalleBtn", function () {
        const idReserva = $(this).data("id-reserva");
        
        $.ajax({
            url: "/reservas/detalles",
            type: "GET",
            data: {
                'id_reserva': idReserva
            },
            success: function (response) {
                if (response.success) {
                    window.location.replace("/reservas/actualizacion");
                } else {
                    alert(tradPerfil[lang].unexpectedError);
                }
            },
            error: function (xhr, status, error) {
                alert(tradPerfil[lang].detailsError);
            },
        });
    });

    const renderReservations = (reservas) => {
        const reservaList = $(".reserva-card-list");
        reservaList.empty();

        if (!reservas) {
            reservaList.html("<p>" + tradPerfil[lang].noReservations + "</p>");
            return;
        }

        reservas.forEach((reserva) => {
            const reservaCard = `
                <div class="reserva-card mb-3 border">
                    <div class="row g-0">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <div class="card-body">
                                <h5 class="card-title">Reserva Localizador: ${reserva.localizador}</h5>
                                <p class="card-text">Fecha de Inicio: ${reserva.fecha_inicio}</p>
                                <p class="card-text">Fecha de Fin: ${reserva.fecha_fin}</p>
                                <p class="card-text">Estado: <span class="badge ${reserva.clase}">
                                    ${reserva.nombre_estado}
                                </span></p>
                            </div>
                            <div class="d-flex align-items-center justify-content-end me-3">
                                <button class="btn btn-info detalleBtn" data-id-reserva="${reserva.id}">Ver Detalles</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            reservaList.append(reservaCard);
        });
    };
});
