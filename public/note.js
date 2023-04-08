function getValue(int) {
    const input = document.getElementById("commentaire_note");
    input.value = int;
}

function changeStar(int) {
    for (let i = int; i > 0; i--) {
        const star = document.getElementById(i);
        star.style.display = "none";
        const star2 = document.getElementById(i+'-h');
        star2.style.display = "inline";
    }
    for (let i = int+1; i <= 5; i++) {
        const star = document.getElementById(i);
        star.style.display = "inline";
        const star2 = document.getElementById(i+'-h');
        star2.style.display = "none";
    }
}


function ResetStar() {
    for (let i = 1; i <= 5; i++) {
        const star = document.getElementById(i);
        star.style.display = "inline";
        const star2 = document.getElementById(i+'-h');
        star2.style.display = "none";
    }
}


