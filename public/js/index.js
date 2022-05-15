import { toRp } from './utils/index.js'
//@ts-check
window.addEventListener('load', () => {
    const hargaPrinter = document.querySelectorAll('.js-harga-printer') ;
    hargaPrinter?.forEach(item => {
        let formattedMoney = toRp(item.textContent)
        item.textContent = formattedMoney;
    })
})