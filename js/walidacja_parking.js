$(document).ready(function() {
    //tutaj wstawiamy kod JQuery, który zostanie uruchomiony
    //jak tylko dokument będzie gotowy do manipulowania jego elementami

    $.validator.addMethod('numer', function (value, element) {
        return /^[0-9]+$/.test(value);
    }, 'Pole musi zawierać tylko cyfry!');

    $('#form_parking').validate({
        //reguły dla pola formularza
        rules: {
            //atrybut name: {reguły}
            Sztuki: {
                //reguły - kolejność ma znaczenia
                required: true,
                numer: true

            }
        },
        //komunikaty dla pola formularza
        messages: {
            Sztuki: {
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