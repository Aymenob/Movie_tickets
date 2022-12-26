
$(document).ready(function () {


    // this my modal  show function
    $('.support-topic-block').on('click', function (e) {
        e.preventDefault();
        var date = $(this).attr('movie_id');
        var url = window.location.href.split('/');
        var cinema_id = url[url.length - 2];
        var movie_id = url[url.length - 1];
        $('#butsave').attr('nbr_tickets', 1);

        $.ajax({
            url: base_url + "Cinema_controller/tickets_availability" + "/" + date + "/" + cinema_id + "/" + movie_id,
            type: "GET",
            dataType: 'json',
            success: function ($data) {
                $Data = $data[0];
                console.log($data);
                $('.quantity').attr("quantity-id", $Data["place_dispo"]);
                $('#image').attr("src", $Data["image"]);
                $('#Date').html($Data["date"]);
                $('#Cinema').html($Data["nom_cinema"]);
                $('#Prix_ticket').html($Data["prix"]);
                $('#Total').html("DNT " + $Data["prix"]);
                $('#butsave').attr('projection_id', $Data["projection_id"]);
                $('#butsave').attr("quantity-id", $Data["place_disponible"]);
            }
        });
        $("#exampleModal3").modal('show');
    });

    //.. increment button...
    $(".quantity").on('change', function () {
        qt = parseInt($(this).val());
        place_dispo = $(this).attr("quantity-id");
        prix_ticket = $('#Prix_ticket').html();
        if (qt * prix_ticket > 0 && qt <= place_dispo) {
            $('#Total').html("DNT " + qt * prix_ticket)
            $('#butsave').attr('nbr_tickets', qt);
        }

        else if (qt * prix_ticket <= 0) {
            toastr.options.timeOut = 40;
            toastr.options = {
                positionClass: 'toast-top-center'
            };
            toastr.error("vous avez atteint le minimum nombre de tickets");
            $(this).val(1);
        }
        else if (qt > place_dispo) {
            toastr.options.timeOut = 40;
            toastr.options = {
                positionClass: 'toast-top-center'
            };
            toastr.error("vous avez atteint le maximum nombre de tickets");
            $(this).val(place_dispo);
        }
    });
    //.. ticket purchase validation...
    $('#butsave').on('click', function (e) {
        e.preventDefault();
        var nbr_tickets = $(this).attr('nbr_tickets');
        console.log(nbr_tickets)
        var projection_id = $('#butsave').attr('projection_id');
        var place_dispo = $('#butsave').attr("quantity-id") - nbr_tickets;
        console.log(place_dispo)
        $.ajax({
            url: base_url + "Cinema_controller/tickets_purchase" + "/" + projection_id + "/" + nbr_tickets + "/" + place_dispo,
            type: "GET",
            dataType: 'json',
            success: function (dataResult) {
                if (dataResult.type === "success") {
                    toastr.options.timeOut = 30;
                    toastr.options.onHidden = function () { location.reload(); }
                    toastr.success(dataResult.msg);
                } else {
                    toastr.error(dataResult.msg);


                }
            },
            error: function (data) {
                toastr.success(data.responseText);
            }

        })

        $("#exampleModal3").modal('show');
    });
});


