const clickHandler = (event) => {
    const heart = document.querySelector('.heart');
    heart.classList.toggle("press");
    const text = document.querySelector('.text');
    text.classList.toggle("press");
}

const btn = document.querySelector('.heart');
btn.addEventListener('click', clickHandler);