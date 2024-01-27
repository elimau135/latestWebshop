 
    function showSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.style.right = "0";
        updateCartCount();
        
    }

    function hideSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.style.right = "-450px";
    }

    function checkout() {
        // Überprüfen, ob sich Artikel im Warenkorb befinden
        if (cartItems.length === 0) {
            alert("Der Warenkorb ist leer. Bitte fügen Sie Artikel hinzu, um fortzufahren.");
            return;
        }
    
        // Weiterleitung zur Checkout-Seite
        window.location.href = "../HTML/Checkout.html";
    }
    
    
    function addToCart(itemId, itemName, itemPrice, itemNumber, availableQuantity) {
        var quantityInput = document.getElementById("quantity" + itemId);
        var quantity = parseInt(quantityInput.value);
    
        // Überprüfe, ob die hinzugefügte Menge die verfügbare Stückzahl überschreitet
        if (quantity > availableQuantity) {
            alert("Die gewählte Menge übersteigt die verfügbare Stückzahl.");
            return;
        }
    
        var imageUrl = document.getElementById("item" + itemId).getElementsByTagName("img")[0].src;
    
        var existingCartItem = findCartItemByNumber(itemNumber);
    
        if (existingCartItem) {
            // Produkt ist bereits im Warenkorb, erhöhe die Menge
            existingCartItem.quantity += quantity;
            updateCartItemQuantity(existingCartItem);
        } else {
            // Produkt ist nicht im Warenkorb, füge es hinzu
            var cartItem = {
                itemName: itemName,
                quantity: quantity,
                price: itemPrice,
                number: itemNumber,
                imageUrl: imageUrl
            };
    
            // Berechne den Rabatt für den neuen Artikel
            cartItem.discount = calculateDiscount(cartItem.quantity);
    
            addCartItemToSidebar(cartItem);
        }
    
        // Verringere die verfügbare Stückzahl des Produkts
        availableQuantity -= quantity;
    
        // Aktualisiere die Anzeige der verfügbaren Stückzahl auf der Seite (optional)
        updateAvailableQuantityOnPage(itemId, availableQuantity);
    
        updateCartCount();
        updateTotalPrice();
        
    }
    function findCartItemByNumber(itemNumber) {
        var cartItems = document.querySelectorAll(".cartItem");
    
        for (var i = 0; i < cartItems.length; i++) {
            var cartItemNumber = cartItems[i].querySelector("p:nth-child(3)").innerText.replace("Artikelnummer: ", "").trim();
    
            if (cartItemNumber === itemNumber.trim()) {
                return {
                    element: cartItems[i],
                    quantity: parseInt(cartItems[i].querySelector("p:nth-child(5) span").innerText)
                };
            }
        }
    
        return null;
    }


    function addCartItemToSidebar(cartItem) {
        var cartItemsList = document.getElementById("cartItems");
        var cartItemElement = document.createElement("li");
        cartItemElement.className = "cartItem";
    
        cartItemElement.innerHTML = `
            <img src="${cartItem.imageUrl}" alt="${cartItem.itemName}">
            <p>${cartItem.itemName}</p>
            <p>Artikelnummer: ${cartItem.number}</p>
            <p>Preis: $${cartItem.price.toFixed(2)}</p>
            <p>Menge: <span>${cartItem.quantity}</span></p>
            <button onclick="removeCartItem(this)">Entfernen</button>
            <button onclick="updateQuantity(this, -1, ${cartItem.price})">-</button>
            <button onclick="updateQuantity(this, 1, ${cartItem.price})">+</button>
        `;
    
        cartItem.discount = 0; // Initialer Rabattwert
        cartItemsList.appendChild(cartItemElement);
    
        showSidebar();
        updateCartDiscountAndTotalPrice();
    }





function updateQuantity(button, change, price) {
    var listItem = button.parentNode;
    var quantityElement = listItem.querySelector("p:nth-child(5) span");
    var currentQuantity = parseInt(quantityElement.innerText);

    var newQuantity = currentQuantity + change;

    if (newQuantity >= 0) {
        quantityElement.innerText = newQuantity;

        if (newQuantity === 0) {
            // Wenn die Menge null ist, entferne den Artikel
            removeCartItem(button);
        } else {
            // Aktualisiere die Rabattberechnung bei Änderung der Menge
            updateCartItemDiscount(listItem);

            updateTotalPrice();
            updateCartCount();
        }
    }
}

function updateTotalPrice() {
    var cartItems = document.querySelectorAll(".cartItem");
    var totalPrice = 0;
    
    cartItems.forEach(function (item) {
        var priceElement = item.querySelector("p:nth-child(4)");
        var quantityElement = item.querySelector("span");
        var discount = parseFloat(item.dataset.discount || "0"); // Rabattwert aus dem Dataset

        var price = parseFloat(priceElement.innerText.replace("Preis: $", ""));
        var quantity = parseInt(quantityElement.innerText);

        // Berechnung des Gesamtpreises unter Berücksichtigung des Rabatts
        totalPrice += (price * quantity) * (1 - discount);
    });

    document.getElementById("totalPrice").innerText = "Gesamtpreis: $" + totalPrice.toFixed(2);
}
function updateCartItemQuantity(existingCartItem) {
    var quantityElement = existingCartItem.element.querySelector("span");
    quantityElement.innerText = existingCartItem.quantity;

    updateTotalPrice();
    updateCartCount();
}

function removeCartItem(button) {
    var listItem = button.parentNode;
    var itemNumber = listItem.querySelector("p:nth-child(3)").innerText.replace("Artikelnummer: ", "").trim();
    var existingCartItem = findCartItemByNumber(itemNumber);

    if (existingCartItem) {
        var quantity = existingCartItem.quantity;

        // Entferne das DOM-Element des Warenkorbeintrags
        listItem.remove();
        updateTotalPrice();

        // Reduziere die Gesamtanzahl um die entfernte Menge
        cartCount -= quantity;
        updateCartCount();
    }
}

function updateCartCount() {
    var totalCount = 0;

    // Berücksichtige die Änderungen in der Sidebar und aktualisiere die Gesamtanzahl
    var sidebarQuantities = document.querySelectorAll("#cartItems .cartItem p:nth-child(5) span");
    sidebarQuantities.forEach(function (quantityElement) {
        totalCount += parseInt(quantityElement.innerText);
    });

    // Aktualisiere die Badge-Anzeige
    document.getElementById("cartCount").innerText = totalCount;
}
function updateAvailableQuantityOnPage(itemId, availableQuantity) {
    // Aktualisieren Sie die Anzeige der verfügbaren Stückzahl auf der Seite
    var availableQuantityElement = document.getElementById("qty" + itemId);
    if (availableQuantityElement) {
        availableQuantityElement.innerText = availableQuantity;
    }
}

function calculateDiscount(quantity) {
    if (quantity >= 10) {
        return 0.2; // 20% Rabatt für 10 oder mehr Artikel
    } else if (quantity >= 5) {
        return 0.1; // 10% Rabatt für 5 oder mehr Artikel
    } else {
        return 0; // Kein Rabatt
    }
}
function updateCartItemDiscount(cartItemElement) {
    var quantityElement = cartItemElement.querySelector("p:nth-child(5) span");
    var quantity = parseInt(quantityElement.innerText);

    var discount = calculateDiscount(quantity);
    
    // Aktualisiere den Rabattwert im Dataset des Elements
    cartItemElement.dataset.discount = discount;

    // Aktualisiere den Gesamtpreis in der Sidebar
    updateTotalPrice();
}
function calculateTotalQuantityInCart() {
    var cartItems = document.querySelectorAll("#cartItems .cartItem p:nth-child(5) span");
    var totalQuantity = 0;

    cartItems.forEach(function (quantityElement) {
        totalQuantity += parseInt(quantityElement.innerText);
    });

    return totalQuantity;
}

function updateDiscounts() {
    var cartItems = document.querySelectorAll(".cartItem");
    var totalQuantity = 0;

    cartItems.forEach(function (item) {
        // Summieren Sie die Mengen aller Artikel im Warenkorb
        totalQuantity += item.quantity;
    });

    cartItems.forEach(function (item) {
        // Aktualisieren Sie den Rabatt basierend auf der Gesamtmenge
        item.discount = calculateDiscount(totalQuantity);
        updateCartItemDiscount(item);
    });

    updateTotalPrice();
}

var discountApplied = false; // Variable, um zu verfolgen, ob der Rabatt bereits angewendet wurde

// Funktion zum Aktualisieren des Rabatts und des Gesamtpreises im Warenkorb
function updateCartDiscountAndTotalPrice() {
    var cartItems = document.querySelectorAll(".cartItem");
    
    cartItems.forEach(function (item) {
        var quantityElement = item.querySelector("p:nth-child(5) span");
        var quantity = parseInt(quantityElement.innerText);

        // Berechnen Sie den Rabatt für jeden Artikel basierend auf seiner Menge
        var discount = calculateDiscount(quantity);

        // Aktualisieren Sie den Rabattwert im Dataset des Elements
        item.dataset.discount = discount;
    });

    updateTotalPrice();
}



