import { orders } from './home.js';
import { BASEURL } from './utils/constants.js';
import { toNormalNum, toRp, Counter } from './utils/index.js';


function displayOrdersList(ordersParam = orders) {
    document.querySelector('.js-orders-list').innerHTML = ordersParam?.map((order, id) => {
        return `
                <div class="row">
                    <div>
                        <img src="${BASEURL}/assets/img/printer/${order?.productThumbnail}"/>
                        <h4>${order?.productName}</h4>
                    </div>
                    <div>
                        <img src="${BASEURL}/assets/icon/minus.svg" class="js-dce-btn"/>
                        <input type="number" value="1" class="js-product-quantity"/>
                        <img src="${BASEURL}/assets/icon/plus.svg" class="js-inc-btn"/>
                    </div>
                    <div class="js-order-price">${order?.productPrice}</div>
                    <div class="delete-option" data-id="${id}" data-product-id="${order?.productId}"></div>
                </div>
                `;
    }).join(' ');
}

function removeOrder() {
    document.querySelector('.js-orders-list').addEventListener('click', ({ target }) => {
        if (target.classList.contains('delete-option')) {
            const id = target.dataset.productId;
            orders.splice(orders.findIndex(t => t.productId === id), 1);

            const filteredOrders = [...orders];
            localStorage.setItem('quantities', JSON.stringify(JSON.parse(localStorage.getItem('quantities')).filter((_, i) => +i !== +target.dataset.id)));
            localStorage.setItem('orders', JSON.stringify(filteredOrders));
            displayOrdersList(filteredOrders);
            checkIfCartIsEmpty(filteredOrders);
            sumOrders();
            setOrders();
            controlQuantity();
        }
    });
}


function checkIfCartIsEmpty(ordersParam = orders) {
    const cartContainer = document.querySelector('.js-cart');
    return ordersParam.length === 0 ? cartContainer.classList.add('is-empty') : cartContainer.classList.remove('is-empty');
}

function sumOrders() {
    const totalPrice = document.querySelector('.js-total-price');

    const total = [...document.querySelectorAll('.js-order-price')].reduce((prev, current) => (prev + toNormalNum(current.textContent)), 0);

    totalPrice.textContent = `${toRp(total)}`;
}


function controlQuantity() {
    const quantities = [...document.querySelectorAll('.js-product-quantity')];
    const orderPrices = document.querySelectorAll('.js-order-price');
    const rows = document.querySelectorAll('.row');

    rows.forEach((row, idx) => {
        const { increment, decrement, getInitial, reset, setInitial } = Counter();
        localStorage.setItem('quantities', JSON.stringify(JSON.parse(localStorage.getItem('quantities'))));

        quantities.forEach((quantity, id) => {
            if (JSON.parse(localStorage.getItem('quantities')) === null) return;
            if (JSON.parse(localStorage.getItem('quantities'))[id]?.quantity === undefined) return;
            quantity.value = JSON.parse(localStorage.getItem('quantities'))[id].quantity;
            orderPrices[id].textContent = toRp(JSON.parse(localStorage.getItem('quantities'))[id].price ?? orderPrices[idx].textContent);
        });
        setInitial(quantities[idx].value);
        sumOrders();


        row?.addEventListener('click', (e) => {

            if (e.target.classList.contains('js-inc-btn')) {
                increment();
                quantities[idx].value = getInitial();

                orderPrices[idx].textContent = toRp(toNormalNum(orders[idx].productPrice) * quantities[idx].value);
                localStorage.setItem('quantities', getQuantities(quantities, orderPrices));
                sumOrders();
                setOrders();
            } else {
                if (quantities[idx].value <= 1) return reset();
                decrement();
                quantities[idx].value = getInitial();
                orderPrices[idx].textContent = toRp(toNormalNum(orderPrices[idx].textContent) - toNormalNum(orders[idx].productPrice));
                localStorage.setItem('quantities', getQuantities(quantities, orderPrices));
                sumOrders();
                setOrders();
            }
        });
    });
}

function getQuantities(quantities, orderPrices) {
    const arr = Array(orderPrices.length).fill().map((_, id) => {
        return {
            price: toNormalNum(orderPrices[id].textContent),
            quantity: quantities[id].value
        };
    });
    return JSON.stringify(arr);
}

displayOrdersList();
removeOrder();
checkIfCartIsEmpty();
sumOrders();
controlQuantity();

window.addEventListener('load', () => {
    localStorage.setItem('quantities', JSON.stringify(
        Array(document.querySelectorAll('.js-order-price').length).fill().map((_, id) => {
            return {
                price: toNormalNum(document.querySelectorAll('.js-order-price')[id].textContent),
                quantity: [...document.querySelectorAll('.js-product-quantity')][id].value
            };
        })
    ));
    setOrders();
});


function setOrders(ordersParam = orders) {
    const userOrders = {
        orders: ordersParam,
        quantities: JSON.parse(localStorage.getItem('quantities')),
        subtotal: toNormalNum(document?.querySelector('.js-total-price')?.textContent)
    };
    document.querySelector('input[name="data"]').value = JSON.stringify(userOrders);
}