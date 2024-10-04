$(document).ready(function () {
    $('#languageSelect').on('change', function () {
        
        const selectedLang = $(this).val();
        
        localStorage.setItem('language', selectedLang);
        let data = {
            'language': selectedLang,
        };

        $.ajax({
            url: "/set-language",
            type: "POST",
            data: data,
            success: function () {
                console.log('cambiado 1');
                
                location.reload();
            },          
            error: function (xhr, status, error) {
                console.log(xhr, status, error)
            }
        });
    });

    const savedLang = localStorage.getItem('language');
    if (savedLang) {
        $('#languageSelect').val(savedLang);
        let data = {
            'language': savedLang,
        };
        
        $.ajax({
            url: "/set-language",
            type: "POST",
            data: data,
            success: function () {
                console.log('cambiado 2');
            },          
            error: function (xhr, status, error) {
                console.log(xhr, status, error)
            }
        });
    }
});