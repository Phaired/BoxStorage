 window.addEventListener('load', (e) => {
        fetch('http://localhost/cardController.php', {
            method: 'POST'
        })
            .then(response => response.json()
            )
            .then(data => {
                addProductsToCard(data)
                calculPrice(data)
            })
            //.then(data => calculPrice(data))
            .catch(error => console.log(error))
    });

function addProductsToCard(response) {
    //console.log(response)

    let product = "";
    var card = document.getElementById("card_products");
    response.map((item)=> {
        item = JSON.parse(item)
        product += `<a href='+"/product/"+${item.shoeId}+'><div id="product">`
        product +=  `<img id="product_image" src='${item.imageUrl}' alt="item photo">`
        product += '<h1 id="product_title">'+item.name+'</h1> <div id="product_details">' 
        product +=  '<h2 id="product_price">'+item.retailPrice+'$</h2>' 
        product +=  '<img id="cross" src="../img/cross.svg" onclick="">' 
        product +=  '</div>' 
        product +=  '</div></a>';
    })
    //console.log(product)
    card.innerHTML += product;
}


function calculPrice(response){
    var price = 0;
    response.map((item)=> {
        price + item.retailPrice;
    })
    var price_card = document.getElementById("card_text_price_value");
    price_card.innerHTML = price+"$";
}