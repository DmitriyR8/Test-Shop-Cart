var burger = document.getElementById("checkbox-burger");
burger.addEventListener("click",function(){
    document.documentElement.classList.toggle("overflow-hidden")
});

var allProductsText = document.querySelectorAll('.products-info');
for(var i = 0; i < allProductsText.length; i++) {
    var text = allProductsText[i].querySelector('.products-info-text');
    if (text.textContent.length > 100) {
        text.textContent = text.textContent.slice(0, 100) + '...';
    }
}

var products = document.querySelectorAll('.cart-product');
for(var i = 0; i < products.length; i++) {
    var description = products[i].children[1];
    if (description.textContent.length > 100) {
        description.textContent = description.textContent.slice(0, 100) + '...';
    }
}

$(".cart-add").click(function (event) {
    const productId = $(event.target).prev().val();

    $.ajax({
        url: 'cart/add',
        type: 'POST',
        data: {id: productId},
        success: function(response) {
            fetchTotalProducts();
            return response;
        }
    });
});


function fetchTotalProducts() {
    $.get('cart/total').then(total => {
        $('.products-total').text('Cart ' + total);
    }).catch(err => {
        console.log(err)
    });
}

fetchTotalProducts();
