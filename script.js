const menu = document.querySelector("#menu");
const nav = document.querySelector(".links");

menu.onclick = () => {
    menu.classList.toggle('bs-x');
    nav.classList.toggle('active');
}