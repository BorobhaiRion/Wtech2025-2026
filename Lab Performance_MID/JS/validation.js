const unitPriceInput = document.getElementById("u_price");
const quantityInput = document.getElementById("qpd");
const totalInput = document.getElementById("t");

const days = 30;

quantityInput.addEventListener("input", function () {

    let unitPrice = parseFloat(unitPriceInput.value) || 0;
    let quantity = parseInt(quantityInput.value) || 0;

    if (quantity < 0) {
        quantity = 0;
        quantityInput.value = 0;
        alert("Quantity cannot be negative");
    }

    let total = unitPrice * quantity * days;

    totalInput.value = total;

    if (total > 1000) {
        window.alert("You are eligible for a gift coupon!");
    }

});