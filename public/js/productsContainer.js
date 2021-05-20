var addShortText = function (pageNumber) {
    var allProductsText = document.querySelectorAll('#all .products-info');
    var counter = (pageNumber - 1) * 6;
    for(var i = counter; i < allProductsText.length; i++) {
        var text = allProductsText[i].querySelector('.products-text-load');
        if (text.textContent.length > 100) {
            text.textContent = text.textContent.slice(0, 100) + '...';
        }
    }
};

