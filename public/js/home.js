import { navbar } from "./navbar.js";

export let orders = [];

(function () {
    if (localStorage.getItem('orders') === null) {
        orders = [];
    } else {
        orders = JSON.parse(localStorage.getItem('orders'));
    }
})();


function addClassToBtn(e) {
    if (e === null) return;
    e.classList.add('added');
    e.classList.contains('added') ? (e.textContent = 'Added') : (e.textContent = 'Add To Cart');
}

export function updateCartOrders() {
    const cartOrders = document.querySelector('.js-cart-orders');

    if (!cartOrders) return;
    if (orders.length <= 0) return;
    cartOrders.classList.add('is-not-empty');
    cartOrders.textContent = orders.length;
}

function updateCard() {
    if (document.querySelector('.js-user') === null) return;
    orders?.forEach(order => {
        const btn = document.querySelector(`.js-add-product[data-product-id="${order?.productId}"]`);
        addClassToBtn(btn);
    });
}

function storeOrder() {
    document.querySelector('.js-products-list')?.addEventListener('click', (e) => {
        if (e.target.classList.contains('js-add-product')) {
            e.preventDefault();
            if (document.querySelector('.js-user') === null) return alert('login first!!!!');
            let thumbnail = e.target.parentElement.parentElement.children[0].src.split('/');

            addToCart({
                printerId: e.target.dataset.productId,
                printerThumbnail: thumbnail[thumbnail.length - 1],
                printerName: e.target.parentElement.children[0].textContent,
                printerSpec: e.target.parentElement.children[1].textContent,
                printerPrice: e.target.parentElement.children[2].textContent,
            });
            updateCard();
            addClassToBtn(e.target);
        }
    });
}


function addToCart({ printerId, printerThumbnail, printerName, printerSpec, printerPrice }) {
    orders.push({
        productId: printerId,
        productThumbnail: printerThumbnail,
        productName: printerName,
        productSpec: printerSpec,
        productPrice: printerPrice
    });
    orders = orders.filter((x, i, a) => a.findIndex(t => (t.productId === x.productId)) === i);

    updateCartOrders();
    localStorage.setItem('orders', JSON.stringify(orders));
}


updateCartOrders();
updateCard();
storeOrder();
navbar();