document.addEventListener("DOMContentLoaded", function () {
    var cartItems = loadCartFromLocalStorage() || loadCartFromCookies();

    if (!cartItems || !Array.isArray(cartItems)) {
        console.error('Fehler beim Laden des Warenkorbs.');
        return;
    }
    // Laden Sie den Warenkorb aus dem Local Storage oder Cookies
    var cartItems = loadCartFromLocalStorage() || loadCartFromCookies();

    // Referenz zur Checkout-Liste erhalten
    var checkoutList = document.getElementById('checkoutList');
    console.log("Checkout List Element:", checkoutList);

    // Gesamtpreis-Element erhalten
    var totalPriceElement = document.getElementById('totalPrice');
    console.log("Total Price Element:", totalPriceElement);

    // Iterate durch den Warenkorb und füge DOM-Elemente zur Checkout-Liste hinzu
    cartItems.forEach(function (cartItem) {
        var li = document.createElement('li');
        li.textContent = cartItem.itemName + ' - Menge: ' + cartItem.quantity + ' - Preis: $' + (cartItem.price * cartItem.quantity).toFixed(2);
        checkoutList.appendChild(li);
    });

    // Gesamtpreis berechnen und anzeigen
    var totalPrice = cartItems.reduce(function (total, item) {
        return total + item.price * item.quantity;
    }, 0);

    totalPriceElement.textContent = 'Gesamtpreis: $' + totalPrice.toFixed(2);
});

// Funktion zum Laden des Warenkorbs aus dem Local Storage
function loadCartFromLocalStorage() {
    var cartItemsString = localStorage.getItem('cartItems');

    if (cartItemsString) {
        return JSON.parse(cartItemsString);
    }

    return null;
}

// Funktion zum Laden des Warenkorbs aus Cookies
function loadCartFromCookies() {
    var cartItemsBase64 = getCookie('cartItems');

    if (cartItemsBase64) {
        // Dekodieren Sie das Base64 und konvertieren Sie es zurück in ein JSON-Array
        return JSON.parse(atob(cartItemsBase64));
    }

    return null;
}
