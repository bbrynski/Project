$(document).ready(function() {
    //tutaj wstawiamy kod JQuery, który zostanie uruchomiony
    //jak tylko dokument będzie gotowy do manipulowania jego elementami
    /**
     Własne metody do walidacji
     **/

    $.validator.addMethod('poleformat', function (value, element) {
        return /^[A-Za-z]+$/.test(value);
    }, 'Pole musi zawierać tylko litery!');

    $.validator.addMethod('telefonformat', function (value, element) {
        //return /^\d+$/.test(value);
        return /^\d{3}-\d{3}-\d{3}$/.test(value);
    }, 'Błędny format(Poprawny XXX-XXX-XXX)');


    $.validator.addMethod('kodformat', function (value, element) {
        return /^\d{2}-\d{3}$/.test(value);
    }, 'Błędny format(Poprawny XX-XXX)');

    $('#add_pracownik').validate({
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
                maxlength: 10
            },
            kod: {
                required: true,
                kodformat: true
            },
            miejscowosc: {
                required: true,
                poleformat: true,
                maxlength: 50
            },
            ulica: {
                required: true,
                poleformat: true,
                minlength: 3,
                maxlength: 50
            },
            nr: {
                required: true,
                maxlength: 10
            },
           
            telefon: {
                //reguły
                required: true,
                telefonformat: true
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
                required: 'Pole wymagane',
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            kod:{
                required: 'Pole wymagane'
            },
            miejscowosc:{
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            ulica:{
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Pole musi zawierać minimum {0} znaki!"),
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            nr:{
                required: 'Pole wymagane',
                maxlength: jQuery.validator.format("Pole musi zawierać maksimum {0} znaki!")
            },
            email: {
                required: 'Pole wymagane',
                minlength: jQuery.validator.format("Adres email musi zawierać minimum {0} znaki!"),
                email: 'Wpisz poprawny adres email',
            },

            telefon: {
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