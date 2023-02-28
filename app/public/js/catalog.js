// Used to abort the page reload when the user submit a form
const form = document.getElementById("form");
form.addEventListener("submit", (e)=> {
    e.preventDefault()
});
