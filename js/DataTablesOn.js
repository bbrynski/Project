 $(document).ready(function () {
        $('#data').DataTable({
          "fnDrawCallback": function (oSettings) {
              $(".KlientDetails").on('click', function () {
                  var path = $(this).attr('data-path');
                  var id = $(this).attr('data-id');
                  $.ajax({
                      type: "POST",
                      url: path + "ajax/KlientDetails.php",
                      dataType: "json",
                      data: {
                          Klient: id
                      },
                      //pomyślne wysłanie danych do skryptu
                      success: function (json) {
                          var ul = $('.list-group').empty();
                          var h2 = $('#szczegoly').text("Szczegóły klienta:");
                          $.each(json, function (k, v) {
                              var li = '<li class="list-group-item">' + k + ': ' + v + '</li>';

                              ul.append(li);
                          });
                      }
                  });
              });
        },
                "language": {
                    "processing": "Przetwarzanie...",
                    "search": "Szukaj:",
                    "lengthMenu": "Pokaż _MENU_ pozycji",
                    "info": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                    "infoEmpty": "Pozycji 0 z 0 dostępnych",
                    "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                    "infoPostFix": "",
                    "loadingRecords": "Wczytywanie...",
                    "zeroRecords": "Nie znaleziono pasujących pozycji",
                    "emptyTable": "Brak danych",
                    "paginate": {
                        "first": "Pierwsza",
                        "previous": "Poprzednia",
                        "next": "Następna",
                        "last": "Ostatnia"
                    },
                    "aria": {
                        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
                    }
                },
                "columnDefs": [{
                    "targets": -1,
                    "orderable": false
                },
                    {
                        "targets": -2,
                        "orderable": false
                    }
                ]
            }
        );
    });
