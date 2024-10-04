import { lang, tradFlujoReservas } from './config.js'; 

$(document).ready(function() {
    let id_estado = $('.estado_reserva').attr('id');

    let cancelBtn = $('#cancel-reservation');
    let payBtn = $('#pay-now');

    if (id_estado == 1 || id_estado == 5 || id_estado == 6) {
        cancelBtn.prop('disabled', true);
    }

    if (id_estado == 2) {
        payBtn.prop('disabled', false);
    } else {
        payBtn.text('Pagado').prop('disabled', true);
    }

    $('#pay-now').on('click', function(e) {
        e.preventDefault();
        $('#payment-section').slideDown(); 
    });

    $('#payment-simulation-form').on('submit', function(e) {
        e.preventDefault();

        let localizador = $('.localizadorReserva').attr('id');

        const cardName = $("#card-name").val();
        const cardNumber = $("#card-number").val();
        const cardExpiry = $("#card-expiry").val();
        const cardCvc = $("#card-cvc").val();

        let data = {
            'localizador': localizador,
            'card_name': cardName,
            'card_number': cardNumber,
            'card_expiry': cardExpiry,
            'card_cvc': cardCvc,
            'action': 'actualizar'
        };
        
        $.ajax({
            url: '/reservas/pago',
            type: 'POST',
            data: data,
            success: function(response) {
                if (response) {
                    $("#payment-result").html(`
                        <div class="alert alert-success" role="alert">
                            ${tradFlujoReservas[lang].paymentSuccess} <!-- Usando la traducción -->
                        </div>
                    `);
                    setTimeout(() => {
                        window.location.replace("/perfil");
                    }, 3000);
                } else {
                    alert(tradFlujoReservas[lang].paymentError + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
                $('.error-message').text(tradFlujoReservas[lang].serverError);
            }
        });
    });
});
