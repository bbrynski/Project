function submitform()
{
    if(document.myform.onsubmit &&
        !document.myform.onsubmit())
    {
        var path = $(this).attr('href');
        $.ajax({
            type     : "GET",
            url      : path,
            dataType: "json",
            //pomyślne wysłanie danych do skryptu
            success : function(r) {
                var div = $('#szczegoly').empty();
                div.append("Model: ");
                div.append(r.StatusZamowienia);
                div.append("<br/>Dostepne sztuki: ");
                div.append(r.StatusZamowienia);
            }
        });
        return false;
    }
    document.myform.submit();
}