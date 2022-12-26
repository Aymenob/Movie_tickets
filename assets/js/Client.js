
$(document).ready(function () {


    //  this is my signin function
    $('#submit_register').on("submit", function (e) {
        e.preventDefault()
        var values = $(this).serializeArray();
        console.log(values)

        $.ajax({
            url: base_url + "Client_controller/sign_in",
            type: "POST",
            dataType: 'json',
            cache: false,
            data: values,
            success: function (dataResult) {
                console.log(dataResult);
                if (dataResult.type === "success") {
                    toastr.options.timeOut = 30;
                    toastr.options.onHidden = function () { $(location).attr('href', base_url); }
                    toastr.success(dataResult.msg);

                } else {
                    toastr.error(dataResult.msg);

                }
            },
            error: function (data) {
                toastr.success(data.responseText);
            }
        });
    });
    //  this is my signin function
    $('#submit_login').on("submit", function (e) {
        e.preventDefault()
        var values = $(this).serializeArray();
        console.log(values)

        $.ajax({
            url: base_url + "Client_controller/logIn",
            type: "POST",
            dataType: 'json',
            cache: false,
            data: values,
            success: function (dataResult) {
                console.log(dataResult);
                if (dataResult.type === "success") {
                    toastr.options.timeOut = 30;
                    toastr.options.onHidden = function () { $(location).attr('href', base_url); }
                    toastr.success(dataResult.msg);

                } else {
                    toastr.error(dataResult.msg);

                }
            },
            error: function (data) {
                toastr.success(data.responseText);
            }
        });
 });
 
 $('#sign-out').click(function (e) {
    e.preventDefault()
    
    alert("success");


    $.ajax({
        url: base_url + "Client_controller/logOut",
        type: "GET",
        dataType: 'json',
        cache: false,
        success: function (dataResult) {
            console.log(dataResult);
            if (dataResult.type === "success") {
                toastr.options.timeOut = 30;
                toastr.options.onHidden = function () { $(location).attr('href', base_url); }
                toastr.success(dataResult.msg);

            } else {
                toastr.error(dataResult.msg);

            }
        },
        error: function (data) {
            toastr.success(data.responseText);
        }
    });
});

});



