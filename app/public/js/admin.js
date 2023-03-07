const root = document.getElementById('root');

const modifbuttons = Array.from(document.getElementsByClassName("modifbtn"));
const addbtn = document.getElementById('additem')

modifbuttons.forEach((item) => {
    item.addEventListener("click",  (e) => {
        modif(e.target.dataset.id);
    });
});

addbtn.addEventListener('click', () => {
    root.innerHTML = "";
    addObject()
})



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
    content += `<input name="shoeId" type='hidden' value='${res.shoeId}'/>`;
    content += `<input name="brand" type='text' value='${res.brand}'/>`;
    content += `<input name="category" type='text' value='${res.category}'/>`;
    content += `<input name="colorway" type='text' value='${res.colorway}'/>`;
    content += `<input name="condition" type='text' value='${res.condition}'/>`;
    content += `<input name="countryOfManufacture" type='text' value='${res.countryOfManufacture}'/>`;
    content += `<input name="description" type='text' value='${res.description}'/>`;
    content += `<input name="gender" type='text' value='${res.gender}'/>`;
    content += `<input name="name" type='text' value='${res.name}'/>`;
    content += `<input name="productCategory" type='text' value='${res.productCategory}'/>`;
    content += `<input name="retailPrice" type='text' value='${res.retailPrice}'/>`;
    content += `<input name="shoe" type='text' value='${res.shoe}'/>`;
    content += `<input name="shortDescription" type='text' value='${res.shortDescription}'/>`;
    content += `<input name="title" type='text' value='${res.title}'/>`;
    content += `<input name="tags" type='text' value='${res.tags}'/>`;

    JSON.parse(res.sizes).map((e) => {
        content += `<label >Taille : ${e.shoeSize}</label>`;
        content += `<input name='${e.shoeSize}' type='text' value='${e.quantity}'/>`;
    })



    content += "<input type='submit'/>"



    content += "</form>"
    root.innerHTML = content;
    const form = document.getElementById('modifform')
    form.addEventListener('submit', (e) => {
        e.preventDefault()
        const formdata = new FormData(e.target)
        //console.log(formdata.getAll('brand'))
        fetch('/admincontroller/modif', {
            method: 'post',
            body: JSON.stringify(Object.fromEntries(formdata))
        })
    })
}

function addObject() {
    let content = "<form id='addform'>"
    content += `<input name="brand" type='text' value='brand'/>`;
    content += `<input name="category" type='text' value='category'/>`;
    content += `<input name="colorway" type='text' value='colorway'/>`;
    content += `<input name="releaseDate" type='text' value='2022-06-08'/>`;
    content += `<input name="imageUrl" type='text' value='imageUrl'/>`;
    content += `<input name="condition" type='text' value='condition'/>`;
    content += `<input name="countryOfManufacture" type='text' value='countryOfManufacture'/>`;
    content += `<input name="description" type='text' value='description'/>`;
    content += `<input name="gender" type='text' value='gender'/>`;
    content += `<input name="name" type='text' value='name'/>`;
    content += `<input name="productCategory" type='text' value='1'/>`;
    content += `<input name="retailPrice" type='text' value='10'/>`;
    content += `<input name="shoe" type='text' value='shoe'/>`;
    content += `<input name="shortDescription" type='text' value='shortDescription'/>`;
    content += `<input name="title" type='text' value='title'/>`;
    content += `<input name="tags" type='text' value='tags'/>`;


    for(let i = 35; i <= 45; i++){
        content += `<label >Taille : ${i}</label>`;
        content += `<input name='${i}' type='text' value='0'/>`;
    }




    content += "<input type='submit'/>"



    content += "</form>"
    root.innerHTML = content;
    const form = document.getElementById('addform')
    form.addEventListener('submit', (e) => {
        e.preventDefault()
        const formdata = new FormData(e.target)
        //console.log(formdata.getAll('brand'))
        fetch('/admincontroller/insert', {
            method: 'post',
            body: JSON.stringify(Object.fromEntries(formdata))
        })
    })
}