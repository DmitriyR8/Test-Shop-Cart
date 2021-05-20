var currentPage = 1;

$('#load-more').click(function () {

    $.ajax({
        url: 'products/all?',
        type: 'GET',
        data: {page: ++currentPage},
        beforeSend:function(){
            $("#load-more-button").text("Loading...");
        },
        success: function(response){
            $( "#all" ).append(response.data);

            currentPage = response.currentPage;
            $("#load-more-button").text('View more');

            if (response.lastPage === response.currentPage) {
                $("#load-more").hide();
            }

            addShortText(response.currentPage);
        }
    })
});
