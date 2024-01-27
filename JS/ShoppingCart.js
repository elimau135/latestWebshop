function addToCart() {
    // Hier fügst du die Logik hinzu, um ein Produkt zum Warenkorb hinzuzufügen.
    // Du kannst die Produktdaten (Bild, Name, Anzahl, etc.) in einem Objekt speichern.
    // Beispiel: var product = { image: "produktbild.jpg", name: "Produktname", quantity: 1 };
    // Füge dann dieses Objekt dem Warenkorb hinzu und rufe die Funktion updateCart() auf.

    // Beispiel:
    var product = { image: "produktbild.jpg", name: "Produktname", quantity: 1 };
    addToCartList(product);
}

function addToCartList(product) {
    var cartItems = document.getElementById("cart-items");

    var cartItemDiv = document.createElement("div");
    cartItemDiv.classList.add("cart-item");

    var productImage = document.createElement("img");
    productImage.src = product.image;
    productImage.alt = "Produktbild";
    productImage.classList.add("cart-product-image");

    var productName = document.createElement("span");
    productName.textContent = product.name;

    var quantityInput = document.createElement("input");
    quantityInput.type = "number";
    quantityInput.value = product.quantity;
    quantityInput.min = 1;
    quantityInput.addEventListener("change", function () {
        updateQuantity(product, quantityInput.value);
    });

    var removeBtn = document.createElement("button");
    removeBtn.textContent = '🗑️';
    removeBtn.addEventListener("click", function () {
        removeFromCart(product);
    });

    cartItemDiv.appendChild(productImage);
    cartItemDiv.appendChild(productName);
    cartItemDiv.appendChild(quantityInput);
    cartItemDiv.appendChild(removeBtn);

    cartItems.appendChild(cartItemDiv);

    updateCart();
}

function updateQuantity(product, newQuantity) {
    // Hier fügst du die Logik hinzu, um die Produktmenge im Warenkorb zu aktualisieren.
    // Beispiel: product.quantity = newQuantity;
    // Führe dann die Funktion updateCart() aus.

    // Beispiel:
    product.quantity = newQuantity;
    updateCart();
}

function removeFromCart(product) {
    // Hier fügst du die Logik hinzu, um ein Produkt aus dem Warenkorb zu entfernen.
    // Beispiel: Entferne das Produktobjekt aus dem Warenkorb-Array.
    // Führe dann die Funktion updateCart() aus.

    // Beispiel:
    // cartItems = cartItems.filter(item => item !== product);
    // updateCart();

    var existingRemoveButtons = document.querySelectorAll('.remove-btn');
    existingRemoveButtons.forEach(button => button.remove());

    var removeBtn = document.createElement("div");
    removeBtn.classList.add("remove-btn");
    removeBtn.innerHTML = `
        
    `;
    
    removeBtn.onclick = function() { removeFromCart(product); };

    var cartItemsContainer = document.getElementById("cart-items");
    cartItemsContainer.appendChild(removeBtn);
}

function updateCart() {
    var cartSidebar = document.getElementById("cart-sidebar");
    var cartItems = document.getElementById("cart-items");

    // Hier fügst du die Logik hinzu, um den Gesamtpreis und andere Informationen zu aktualisieren.
    // Beispiel: Iteriere über das Warenkorb-Array und aktualisiere den Inhalt des "cartItems" div.

    // Beispiel:
    // cartItems.innerHTML = "";
    // cartItemsArray.forEach(product => {
    //     addToCartList(product);
    // });

    // Aktualisiere den Gesamtpreis, Gesamtanzahl oder andere Informationen.

    // Animation, um den Warenkorbfenster ein- und auszublenden
    if (cartItems.children.length > 0) {
        cartSidebar.style.right = "0";
    } else {
        cartSidebar.style.right = "-33%";
    }
}

function closeCart() {
    var cartSidebar = document.getElementById("cart-sidebar");
    cartSidebar.style.right = "-33%";
}
function openCart() {
    var cartSidebar = document.getElementById("cart-sidebar");
    cartSidebar.style.right = "0%";
}


