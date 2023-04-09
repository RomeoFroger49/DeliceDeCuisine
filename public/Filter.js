
function filterList() {
    const searchInput = document.getElementById("searchInput");
    const filter = searchInput.value.toUpperCase();
    const listItems = document.getElementsByTagName("li");
    let cnt = 0;
    for (let i = 0; i < listItems.length; i++) {
        const item = listItems[i];
        const textValue = item.textContent || item.innerText;

        if (textValue.toUpperCase().indexOf(filter) > -1 && cnt<=4 ) {
            // permet de ne pas afficher plus de 5 résultats dans la liste pour ne pas surcharger l'affichage s'il y a beaucoup de résultats
            item.style.display = "";
            cnt++;
        } else {
            item.style.display = "none";
        }
    }



}





