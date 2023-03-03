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
}