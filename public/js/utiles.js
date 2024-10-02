const validateEmail =(email) => {
    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    console.log(regex.test(email));
    return regex.test(email);
}

const sanitizeForm = (formData) => {
    let sanitizedForm = {};

    return sanitizedForm;
};