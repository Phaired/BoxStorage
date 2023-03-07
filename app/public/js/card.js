 window.addEventListener('load', (e) => {
        fetch('http://localhost/cardController.php', {
            method: 'POST'
        })
            .then(response => response.json())
            .then(data => addProductsToCard(data))
            .then(data => calculPrice(data))
            .catch(error => console.log(error))
    });

function addProductsToCard(response) {
    let product = "";
    var card = document.getElementById("card_products");
    catalog.innerHTML = "";
    response.map((item)=> {
        product += '<a href='+"/product/"+item.shoeId+'><div id="product">' +
            '<img id="product_image" src=' + item.imageUrl + 'alt="item photo">' +
            '<h1 id="product_title">'+item.name+'</h1> <div id="product_details">' +
            '<h2 id="product_price">'+item.retailPrice+'$</h2>' +
            '<img id="cross" src="../img/cross.svg" onclick="">' +
            '</div>' +
            '</div></a>';
    })
    card.innerHTML += product;
}

function calculPrice(){
    var price = 0;
    catalog.innerHTML = "";
    response.map((item)=> {
        price + item.retailPrice;
    })
    var price_card = document.getElementById("card_text_price_value");
    price_card.innerHTML = price+"$";
}