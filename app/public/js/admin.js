const root = document.getElementById('root');

const modifbuttons = Array.from(document.getElementsByClassName("modifbtn"));

modifbuttons.forEach((item) => {
    item.addEventListener("click",  (e) => {
        modif(e.target.dataset.id);
    });
});



function modif(id) {
    root.innerHTML = "";
    fetch('http://localhost/productController.php', {
        method: 'POST',
        body: JSON.stringify({
            shoeId: id,
            admin: true
        })})
        .then(res => res.json())
        .then(res => setObject(res))
}


function setObject(res) {
    let content = "<form id='modifform'>"
    content += `<input type='text' value='${res.brand}'/>`;
    content += `<input type='text' value='${res.category}'/>`;
    content += `<input type='text' value='${res.colorway}'/>`;
    content += `<input type='text' value='${res.condition}'/>`;
    content += `<input type='text' value='${res.countryOfManufacture}'/>`;
    content += `<input type='text' value='${res.description}'/>`;
    content += `<input type='text' value='${res.gender}'/>`;
    content += `<input type='text' value='${res.name}'/>`;
    content += `<input type='text' value='${res.productCategory}'/>`;
    content += `<input type='text' value='${res.retailPrice}'/>`;
    content += `<input type='text' value='${res.shoe}'/>`;
    content += `<input type='text' value='${res.shortDescription}'/>`;
    content += `<input type='text' value='${res.title}'/>`;
    content += `<input type='text' value='${res.tags}'/>`;

    JSON.parse(res.sizes).map((e) => {
        content += `<label for='size' >${e.shoeSize}</label>`;
        content += `<input id='size' type='text' value='${e.quantity}'/>`;
    })







    content += `<h1>${res.category}</h1>`
    content += "</form>"
    root.innerHTML = content;
}