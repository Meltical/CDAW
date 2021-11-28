let table = document.getElementById('table');

function clickHandler(e) {
    text_array = e.target.innerText.split('\n')
    alert(text_array[0] + " a bien été ajouté");
}

table.addEventListener('click', clickHandler);