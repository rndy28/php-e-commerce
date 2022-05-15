export function navbar(){
    const btnOpen = document.querySelector('.js-open-nav');
    const btnClose = document.querySelector('.js-close-nav');
    const navList = document.querySelector('.js-nav-list')
    btnOpen.addEventListener('click', () => navList.classList.add('is-visible'));
    btnClose.addEventListener('click', () => navList.classList.remove('is-visible'));
}