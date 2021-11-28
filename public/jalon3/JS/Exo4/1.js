const clickHandler = (event) => {
    if (event.srcElement.id = 1) {
        btn2.addEventListener('click', clickHandler);
    }
    if (event.srcElement.id = 2) {
        btn1.addEventListener('click', clickHandler);
    }
    event.srcElement.removeEventListener('click', clickHandler);
    console.log("I have the event listener")
}

const btn1 = document.querySelector('.btn1');
const btn2 = document.querySelector('.btn2');
btn1.addEventListener('click', clickHandler);