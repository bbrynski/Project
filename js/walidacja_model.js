$(document).ready(function() {

    $.validator.addMethod('cenaformat', function (value, element) {
        return /^\d{2,3}(\ \d{3})?$/.test(value);
    }, 'Podany format jest nieprawidłowy');

    $.validator.addMethod('pojemnoscformat', function (value, element) {
        return /^\d{1}(\.\d{1})?$/.test(value);
    }, 'Podany format jest nieprawidłowy');


    $('#addModel').validate({
        rules: {
            //atrybut name: {reguły}
            nazwaModel: {

                required: true,
                minlength: 3,
                maxlength: 40

            },
            cena: {
                required: true,
                cenaformat:true
            },
            pojemnosc: {
                required: true,
                pojemnoscformat: true
            },
            MaxMoc: {
                required: true,
                maxlength: 3
            }
        },

        messages: {
            nazwaModel: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            MaxMoc: {
                required: 'Pole wymagane',
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            pojemnosc:{
                required: 'Pole wymagane'
            },
            cena:{
                required: 'Pole wymagane'
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