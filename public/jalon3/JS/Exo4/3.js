let m1 = document.getElementById("m1");
let m2 = document.getElementById("m2");
let m3 = document.getElementById("m3");
let focus = document.getElementById("focus");
let medias = document.getElementById("medias");
let curr = m1;
focus.append(m1);

function changeItem(arrow) {
    current_id = curr.id.substr(1);
    medias.append(curr);
    if (arrow === "l") {
        if (current_id === "1") {
            current_id = "3";
        } else {
            current_id--;
        }
    } else if (arrow === "r") {
        if (current_id === "3") {
            current_id = "1";
        } else {
            current_id++;
        }
    }
    curr = document.getElementById("m" + current_id)
    focus.append(curr);
}

document.onkeydown = function (e) {
    switch (e.keyCode) {
        case 37:
            changeItem("l");
            break;
        case 39:
            changeItem("r");
            break;
        default:
            break;
    }
};