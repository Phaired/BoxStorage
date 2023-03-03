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
    var product;
    var catalog = document.getElementById("products");
    response.map((item)=> {
        product = '<a href='+"/product/"+item.shoeId+'><div id="product">' +
            '<img id="product_image" src=' + item.imageUrl + 'alt="item photo">' +
            '<h1 id="product_title">'+item.name+'</h1> <div id="product_details">' +
            '<h2 id="product_price">'+item.retailPrice+'</h2>' +
            '</div>' +
            '</div></a>'
    })
    catalog.innerHTML += product;
/*
shoeId: "0042f5c5-8be4-4a40-982b-1b31dacec04b", brand: "Nike", category: "Nike Basketball Dunk", … }
 
brand: "Nike"
 
category: "Nike Basketball Dunk"
 
colorway: "Midnight Navy/Marine Minuit"
 
condition: "New"
 
countryOfManufacture: "VN"
 
description: "Drawing inspiration from passports and government documentation, the Nike Dunk Low Union Passport Pack Pistachio features a light green and navy leather upper that is shrouded in a semi-translucent ripstop nylon. A Walter Lee Young-inspired emblem at the heel and a yellow Union LA tab on the quarter panel adds a touch of customization. At the base, a semi-translucent sole completes the design.<br><br>The Nike Dunk Low Union Passport Pack Pistachio released in February of 2022 and retailed for $150."
 
gender: "men"
 
imageUrl: "https://images.stockx.com/images/Nike-Dunk-Low-Union-Midnigh…bp&auto=compress&trim=color&q=90&dpr=2&updated_at=1646233505"
 
name: "Union Passport Pack Pistachio"
 
productCategory: 1
 
releaseDate: "2022-02-11"
 
retailPrice: 150
 
shoe: "Nike Dunk Low"
 
shoeId: "0042f5c5-8be4-4a40-982b-1b31dacec04b"
 
shortDescription: "Nike-Dunk-Low-Union-Midnight-Navy"
 
tags: "sneakers+nike+nike basketball+dunk+low+midnight navy/marine minuit+2022-02-11+150+dj9649-401"
 
title: "Nike Dunk Low Union Passport Pack Pistachio"

<?php
include_once ("header.php");
?>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/item_catalog.css">
<link rel="shortcut icon" href="./img/logo_simple.png" />

<div id="product">
    <img id="product_image" src="../img/sample_jordan.png" alt="item photo">
    <h1 id="product_title">Jordan 1</h1>
    <div id="product_details">
        <h2 id="product_price">180$</h2>
        <a href=""><img src="../img/card.svg" id="card"></a>
    </div>
</div>*/
}