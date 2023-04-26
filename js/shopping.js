let oppenShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');
                            

oppenShopping.addEventListener('click', () => {
    body.classList.add('active');
})

closeShopping.addEventListener('click', () => {
    body.classList.remove('active');
})



let products = [
    {
        id : 1,
        name: 'Product 1',
        image: '1.png',
        price: 12
    },

    {
        id : 2,
        name: 'Product 2',
        image: '2.png',
        price: 43
    },

    {
        id : 3,
        name: 'Product 3',
        image: '3.png',
        price: 32
    },

    {
        id : 4,
        name: 'Product 4',
        image: '4.png',
        price: 1342
    },

    {
        id : 5,
        name: 'Product 5',
        image: '5.png',
        price: 433
    },

    {
        id : 6,
        name: 'Product 6',
        image: '6.png',
        price: 764
    }
];

let listCards = [];

initApp();

function initApp() {
    products.forEach((value, key) => {
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="images/${value.image}" /> 
            <div class="title"> ${value.name} </div>
            <div class="price"> ${value.price.toLocaleString()} </div>
            <button onclick="addToCard(${key})">Add To Card</button>
        `;
        list.appendChild(newDiv);
    })
}

function addToCard(key) {
    if (listCards[key] == null) {
        listCards[key] = products[key];
        listCards[key].quantity = 1;
    }
    reloadCards();
}

function reloadCards() {
    listCard.innerHTML = ``;
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key) => {
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;

        if (value != null) {
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div> 
                    <img src="images/${value.image}"/>
                </div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>
                `;
            listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerHTML = count;
}

function changeQuantity(key, quantity) {
    if (quantity == 0) {
        delete listCards[key];
    }
    else {
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
        console.log(quantity, products[key].price, listCards[key].price); 
    }
    reloadCards();
}