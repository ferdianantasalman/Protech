let userBox = document.querySelector('.header .user-box');
let searchForm = document.querySelector('.search-form');

document.querySelector('#user-btn').onclick = () => {
    userBox.classList.toggle('active');
}


document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
}