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
    let content = "<form>"
    content += `<h1>${res.category}</h1>`
    content += "</form>"
}