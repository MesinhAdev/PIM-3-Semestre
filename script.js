let cart = [];

function toggleCart() {

    const cartElement = document.getElementById("cart");

    cartElement.classList.toggle("active");
}

async function addToCart(produtoId) {

    const response = await fetch("backend/adicionar_carrinho.php", {

        method: "POST",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify({
            produto_id: produtoId
        })
    });

    const data = await response.json();

    if (data.success) {

        updateCart();

        alert("Produto adicionado ao carrinho!");
    }
}

async function removeItem(index) {

    await fetch("backend/remover_carrinho.php", {

        method: "POST",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify({
            index: index
        })
    });

    updateCart();
}

async function updateCart() {

    const response = await fetch("backend/buscar_carrinho.php");

    cart = await response.json();

    const cartItems = document.getElementById("cart-items");

    const cartCount = document.getElementById("cart-count");

    const cartTotal = document.getElementById("cart-total");

    cartItems.innerHTML = "";

    let total = 0;

    cart.forEach((item, index) => {

        total += item.preco * item.quantidade;

        cartItems.innerHTML += `

        <div class="cart-item">

            <img src="${item.imagem}" width="60">

            <div>

                <h4>${item.nome}</h4>

                <p>
                    Quantidade: ${item.quantidade}
                </p>

                <p>
                    R$ ${parseFloat(item.preco).toFixed(2)}
                </p>

            </div>

            <button onclick="removeItem(${index})">
                ❌
            </button>

        </div>
        `;
    });

    if (cart.length === 0) {

        cartItems.innerHTML = `
        <p class="empty">
            Seu carrinho está vazio.
        </p>
        `;
    }

    cartCount.innerText = cart.length;

    cartTotal.innerText = `
        R$ ${total.toFixed(2)}
    `;
}

function checkout() {

    if (cart.length === 0) {

        alert("Seu carrinho está vazio!");

        return;
    }

    window.location.href = "checkout.php";
}

updateCart();