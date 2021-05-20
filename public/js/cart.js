$("#add").click(function () {
    var product_id = $("#product-id").val();

    $.ajax({
        url: 'cart/add',
        type: 'POST',
        data: {id: product_id},
        success: function(response) {
            location.reload();
            return response;
        }
    });
});

$("#remove").click(function () {
    var product_id = $("#product-id").val();

    $.ajax({
        url: 'cart/remove',
        type: 'POST',
        data: {id: product_id},
        success: function(response) {
            location.reload();
            return response;
        }
    });
});

$("#trash").click(function () {
    var product_id = $("#product-id").val();

    $.ajax({
        url: 'cart/trash',
        type: 'POST',
        data: {id: product_id},
        success: function(response) {
            location.reload();
            return response;
        }
    });
});

$("#shipping-redirect").click(function () {
    $.ajax({
        url: 'shipping',
        type: "GET",
        success: function(response) {
            window.location = ("shipping");
            return response;
        }
    });
});


