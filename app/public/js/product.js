window.addEventListener('load', (e) => {
    let url = window.location.href.split("/");

    let body = {
        "shoeId": url[url.length - 1]
    }
    console.log(body);
    fetch('http://localhost/productController.php', {
        method: 'POST',
        body: JSON.stringify(body)
    })
        .then(response => response.json())
        .then(data => populateProductDetails(data))
        .catch(error => console.log(error))
});

function populateProductDetails(response) {
    console.log(response);
    document.getElementById("product_image").src = response.imageUrl;
    document.getElementById("title").textContent = response.title;
    document.getElementById("price").textContent = response.retailPrice + "$";
    document.getElementById("product_color").textContent = response.colorway;
    document.getElementById("product_release").textContent = response.releaseDate;
    if (response.description != null) {
        document.getElementById("product_desc").textContent = response.description;
    } else {
        document.getElementById("product_desc").style.display = "none";
    }

    let sizes = JSON.parse(response.sizes);
    let str = "<option value=''>-- Please choose a size --</option>"
    for (let i = 0; i < sizes.length; i++) {
        str += "<option value='"+ sizes[i].shoeSize + "'>" + sizes[i].shoeSize  + "</option>";
    }
    document.getElementById("size").innerHTML = str;

    if (response.stock == false) {
        document.getElementById("no_stock").style.display = "block";
        document.getElementById("button_card").style.display = "none";
        document.getElementById("button_order").style.display = "none";
    }
}