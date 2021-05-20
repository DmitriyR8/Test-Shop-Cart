$("#order-create").click(function () {

    var name = $("#name").val();
    var email = $("#email").val();
    var address = $("#address").val();
    var phone = $("#phone").val();
    var id = $("#id").val();

    $.ajax({
        type: "POST",
        url: 'shipping/create',
        data: {
            name: name,
            email: email,
            address: address,
            phone: phone,
            shipping_id: id
        },
        success: function (response) {
            return response;
        }
    });
});
