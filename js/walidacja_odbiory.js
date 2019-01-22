$(document).ready(function() {
    //tutaj wstawiamy kod JQuery, który zostanie uruchomiony
    //jak tylko dokument będzie gotowy do manipulowania jego elementami

    $.validator.addMethod('polenumer', function (value, element) {
        return /^[A-Za-z0-9]+$/.test(value);
    }, 'Pole musi zawierać tylko litery i cyfry!');

    $('#add_odbior').validate({
        //reguły dla pola formularza
        rules: {
            //atrybut name: {reguły}
            imie: {
                //reguły - kolejność ma znaczenia
                required: true,
                poleformat: true,
                minlength: 3,
                maxlength: 30

            },
            nazwisko: {
                required: true,
                poleformat: true,
                minlength: 3,
                maxlength: 30
            },
            numer: {
                required: true,
                polenumer: true
            },
            data: {
                required: true
            }
        },
        //komunikaty dla pola formularza
        messages: {
            imie: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            nazwisko: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            numer:{
                required: 'Pole wymagane'
            },
            data:{
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
        /**niestandradowa reakcja na kliknięcie submit,
         gdy nie ma błędów,
         blokuje standradową akcję
         **/
        /*submitHandler: function(form) {
            alert('reakcja na subit');
        },*/
        /**
         niestadardowa rekacja na kliknięcie submit,
         gdy są błędy,
         blokuje standradową akcję
         **/
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