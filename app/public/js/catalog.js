// Used to abort the page reload when the user submit a form
const form = document.getElementById("form");

let body = {};

// Premier load des données
window.addEventListener('load', (e) => {
    body.request = "brands"
    fetch('http://localhost/catalogController.php', {
        method: 'POST',
        body: JSON.stringify(body)
    })
        .then(response => response.json())
        .then(data => _populateBrands(data))
        .catch(error => console.log(error))

    body = {
        request: "products",
        keyword: null,
        brand: null,
        min_price: null,
        max_price: null
    }

    fetch('http://localhost/catalogController.php', {
        method: 'POST',
        body: JSON.stringify(body)
    })
        .then(response => response.json())
        .then(data => addProductsToCatalog(data))
        .catch(error => console.log(error))
});

// On filtre les données
form.addEventListener("submit", (e)=> {
    e.preventDefault()

    body = {
        request: "products",
        keyword: document.getElementById("keyword").value,
        brand: document.getElementById("brand").value,
        min_price: document.getElementById("min-price").value,
        max_price: document.getElementById("max-price").value
    }

    fetch('http://localhost/catalogController.php', {
        method: 'POST',
        body: JSON.stringify(body)
    })
        .then(response => response.json())
        .then(data => addProductsToCatalog(data))
        .catch(error => console.log(error))
});


function _populateBrands(response) {
    let str = "<option value=''>-- Please choose a brand --</option>"
    for (let i = 0; i < response.length; i++) {
        str += "<option value='"+ response[i].brand + "'>" + response[i].brand + "</option>";
    }
    document.getElementById("brand").innerHTML = str;
}

function addProductsToCatalog(response) {
    let product = "";
    var catalog = document.getElementById("products");
    catalog.innerHTML = "";
    response.map((item)=> {
        product += '<a href='+"/product/"+item.shoeId+'><div id="product">' +
            '<img id="product_image" src=' + item.imageUrl + 'alt="item photo">' +
            '<h1 id="product_title">'+item.name+'</h1> <div id="product_details">' +
            '<h2 id="product_price">'+item.retailPrice+'</h2>' +
            '</div>' +
            '</div></a>'
    })
    catalog.innerHTML += product;
}