export const userLanguage = navigator.language || navigator.userLanguage; 
export const lang = userLanguage.startsWith('es') ? 'es' : 'en'; 

export const tradFlujoReservas = {
    es: {
        paymentSuccess: "¡Pago simulado exitosamente! Gracias por tu reserva.",
        paymentError: "Error al realizar el pago: ",
        serverError: "Error en el servidor. Inténtalo de nuevo más tarde.",

    },
    en: {
        paymentSuccess: "Payment simulated successfully! Thank you for your reservation.",
        paymentError: "Error processing the payment: ",
        serverError: "Server error. Please try again later.",

    },
};

export const tradHabitaciones = {
    es: {
        fetchingError: "Error al obtener habitaciones.",
        noRoomsAvailable: "No hay habitaciones disponibles.",
        roomName: "Nombre de la habitación",
        roomDescription: "Descripción de la habitación"
    },
    en: {
        fetchingError: "Error fetching rooms.",
        noRoomsAvailable: "No rooms available.",
        roomName: "Room Name",
        roomDescription: "Room Description"
    },
};

export const tradLogin = {
    es: {
        emailEmpty: "El campo de correo electrónico no puede estar vacío.",
        emailInvalid: "Por favor, ingresa un correo electrónico válido.",
        passwordEmpty: "El campo de contraseña no puede estar vacío.",
        serverError: "Error en el servidor. Inténtalo de nuevo más tarde.",
    },
    en: {
        emailEmpty: "The email field cannot be empty.",
        emailInvalid: "Please enter a valid email.",
        passwordEmpty: "The password field cannot be empty.",
        serverError: "Server error. Please try again later.",
    },
};

export const tradPerfil = {
    es: {
        errorLoadingReservations: "Error al cargar las reservas. Inténtalo de nuevo más tarde.",
        noReservations: "No tienes reservas.",
        enterName: "Por favor, ingresa tu nombre.",
        enterSurname: "Por favor, ingresa tu apellido.",
        invalidEmail: "Por favor, ingresa un correo electrónico válido.",
        enterCountry: "Por favor, ingresa tu país.",
        enterPhone: "Por favor, ingresa tu teléfono.",
        enterPassword: "Debes escribir una contraseña de al menos 12 caracteres, una mayúscula, una minúscula y un símbolo",
        invalidPassword: "La contraseña debe tener al menos 12 caracteres, una mayúscula, una minúscula y un símbolo.",
        confirmDeleteAccount: "¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.",
        serverError: "Error en el servidor. Inténtalo de nuevo más tarde.",
        detailsError: "Error ocurrido al realizar la reserva. Inténtalo de nuevo.",
        unexpectedError: "Ha ocurrido un error.",
    },
    en: {
        errorLoadingReservations: "Error loading reservations. Please try again later.",
        noReservations: "You have no reservations.",
        enterName: "Please enter your name.",
        enterSurname: "Please enter your surname.",
        invalidEmail: "Please enter a valid email address.",
        enterCountry: "Please enter your country.",
        enterPhone: "Please enter your phone number.",
        enterPassword: "You must write a password of at least 12 characters, one uppercase, one lowercase, and one symbol.",
        invalidPassword: "The password must have at least 12 characters, one uppercase, one lowercase, and one symbol.",
        confirmDeleteAccount: "Are you sure you want to delete your account? This action cannot be undone.",
        serverError: "Server error. Please try again later.",
        detailsError: "An error occurred while performing the reservation. Please try again.",
        unexpectedError: "An error occurred.",
    },
};

export const tradRegistro = {
    es: {
        enterName: "Por favor, ingresa tu nombre.",
        enterSurname: "Por favor, ingresa tu apellido.",
        enterCountry: "Por favor, ingresa tu país.",
        enterPhone: "Por favor, ingresa tu teléfono.",
        invalidEmail: "Por favor, ingresa un correo electrónico válido.",
        serverError: "Error en el servidor. Inténtalo de nuevo más tarde.",
        successMessage: "Registro exitoso. Redirigiendo...",
    },
    en: {
        enterName: "Please enter your name.",
        enterSurname: "Please enter your surname.",
        enterCountry: "Please enter your country.",
        enterPhone: "Please enter your phone number.",
        invalidEmail: "Please enter a valid email address.",
        serverError: "Server error. Please try again later.",
        successMessage: "Registration successful. Redirecting...",
    },
};

export const tradReservas = {
    es: {
        errorLoadingRooms: "Error al cargar las habitaciones.",
        noRoomsAvailable: "No hay habitaciones disponibles.",
        dateError: "Las fechas no pueden ser menores a la fecha actual.",
        reservationError: "Ha ocurrido un error.",
        paymentSuccess: "¡Pago simulado exitosamente!<br>Gracias por tu reserva.",
        paymentFailure: "Ha habido un error con el pago.<br>Complétalo en tu perfil.",
        paymentServerError: "Error al realizar el pago. Inténtalo de nuevo.",
    },
    en: {
        errorLoadingRooms: "Error loading rooms.",
        noRoomsAvailable: "No rooms available.",
        dateError: "Dates cannot be earlier than the current date.",
        reservationError: "An error occurred.",
        paymentSuccess: "Payment simulated successfully!<br>Thank you for your reservation.",
        paymentFailure: "There was an error with the payment.<br>Please complete it in your profile.",
        paymentServerError: "Error processing the payment. Please try again.",
    },
};