$(document).ready(function() {

    $.validator.addMethod('cenaformat', function (value, element) {
        return /^\d{5,6}?$/.test(value);
    }, 'Podany format jest nieprawidłowy');

    $('#add_silnik').validate({
        rules: {
            //atrybut name: {reguły}
            pojemnosc: {
                required: true
            },
            moc: {
                required: true,
            },
            cena: {
                required: true,
                cenaformat:true
            }
        },

        messages: {
            pojemnosc: {
                required: 'Pole wymagane'
            },
            moc:{
                required: 'Pole wymagane'
            },
            cena:{
                required: 'Pole wymagane',
            }
        },
        highlight: function(element, errorClass, validClass) {
            //znajdz najbliższy element form-group
            $(element).closest('input').addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).closest('input').removeClass(errorClass).addClass(validClass);
        },
        errorClass: 'is-invalid',
        validClass: 'is-valid',

        invalidHandler: function(event, validator) {
            // 'this' to referencja do form
            var errors = validator.numberOfInvalids();
            if (errors) {
                var message = errors == 1
                    ? 'Nie wypełniono poprawnie 1 pola. Zostało podświetlone'
                    : 'Nie wypełniono poprawnie ' + errors + ' pól. Zostały podświetlone';
                $("div.alert-danger").html(message);
                $("div.alert-danger").show();
            } else {
                $("div.alert-danger").hide();
            }
        },
    });
});