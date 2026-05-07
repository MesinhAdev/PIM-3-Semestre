const cart = [];

function toggleCart(){

document
.getElementById("cart")
.classList
.toggle("active");

}

function addToCart(name,price){

cart.push({
name,
price
});

updateCart();

}

function updateCart(){

const cartItems =
document.getElementById("cart-items");

const cartCount =
document.getElementById("cart-count");

const cartTotal =
document.getElementById("cart-total");

cartItems.innerHTML = "";

let total = 0;

cart.forEach((item,index)=>{

total += item.price;

cartItems.innerHTML += `

<div class="cart-item">

<div>

<h4>${item.name}</h4>

<p>
R$ ${item.price.toFixed(2)}
</p>

</div>

<button onclick="removeItem(${index})">

❌

</button>

</div>

`;

});

if(cart.length === 0){

cartItems.innerHTML = `

<p class="empty">
Seu carrinho está vazio.
</p>

`;

}

cartCount.innerText =
cart.length;

cartTotal.innerText =
`R$ ${total.toFixed(2)}`;

}

function removeItem(index){

cart.splice(index,1);

updateCart();

}

/* TEMA */

const themeButton =
document.getElementById("theme-toggle");

themeButton.addEventListener("click",()=>{

document.body
.classList
.toggle("dark-mode");

if(
document.body.classList
.contains("dark-mode")
){

themeButton.innerText = "☀️";

}else{

themeButton.innerText = "🌙";

}

});

/* ANIMAÇÃO */

const cards =
document.querySelectorAll(
".product-card"
);

window.addEventListener("scroll",()=>{

cards.forEach(card=>{

const top =
card.getBoundingClientRect().top;

if(top < window.innerHeight - 50){

card.style.opacity = "1";

card.style.transform =
"translateY(0px)";

}

});

});

cards.forEach(card=>{

card.style.opacity = "0";

card.style.transform =
"translateY(40px)";

card.style.transition =
"0.6s";

});