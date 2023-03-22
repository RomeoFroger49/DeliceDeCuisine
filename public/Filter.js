const list = [
    "Apple",
    "Banane",
    "Cerise",
    "Datte",
    "Figue",
    "Grenade",
    "Myrtille"
];

document.addEventListener("DOMContentLoaded", () => {
    const listElement = document.getElementById("list");
    list.forEach(item => {
        const li = document.createElement("li");
        li.textContent = item;
        li.classList.add("list-item");
        listElement.appendChild(li);
    });
});

function filterList() {
    const searchInput = document.getElementById("searchInput");
    const filter = searchInput.value.toUpperCase();
    const listItems = document.getElementsByClassName("list-item");

    for (let i = 0; i < listItems.length; i++) {
        const item = listItems[i];
        const textValue = item.textContent || item.innerText;

        if (textValue.toUpperCase().indexOf(filter) > -1) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    }
}

function toggleListVisibility(show) {
    const listElement = document.getElementById("list");
    listElement.style.display = show ? "block" : "none";
}