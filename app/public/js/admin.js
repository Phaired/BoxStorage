const root = document.getElementById('root');


class Item {
    constructor(id, name) {
        this.id = id
        this.name = name
    }
}


const obj = [new Item(1, "abc"), new Item(2, "test")]

let content = ""
obj.map((e) => {
    content += `<div><p>${e.id}</p><p>${e.name}</p></div>`
})

root.innerHTML = content