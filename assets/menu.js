// Initialize an empty array to store selected items
const selectedItems = [];
const totalAmount=document.getElementById("totalAmount");

// Function to add items to the cart
function addItem(itemName, itemPrice) {
    const cartItems = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    // Create a new hidden input for the item
    const inputItem = document.createElement("input");
    inputItem.type = "hidden";
    inputItem.name = "items[]"; // Use an array for multiple items
    inputItem.value = `${itemName} - ₹${itemPrice.toFixed(2)}`;

    // Create a new list item for the cart
    const listItem = document.createElement("li");
    listItem.className = "cart-item";
    listItem.textContent = `${itemName} - ₹${itemPrice.toFixed(2)}`;

    // Create a "Remove" button for the cart item
    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.addEventListener("click", () => {
        listItem.remove();
        updateTotal();
        removeSelectedItem(itemName);
    });

    listItem.appendChild(removeButton);
    cartItems.appendChild(listItem);

    // Add the selected item to the array
    selectedItems.push({ name: itemName, price: itemPrice });

    // Add the input to the form
    document.getElementById("order-form").appendChild(inputItem);

    // Update the total
    updateTotal();
}

// Function to update the total cost
function updateTotal() {
    const cartTotal = document.getElementById("cart-total");
    const cartItems = document.querySelectorAll(".cart-item");

    let total = 0;

    cartItems.forEach((item) => {
        const price = parseFloat(item.textContent.split(" - ₹")[1]);
        total += price;
    });

    cartTotal.textContent = `₹${total.toFixed(2)}`;
    totalAmount.value= total;
}

// Function to add menu items dynamically
function addMenuItems() {
    const menu = document.querySelector(".menu");

    menuData.forEach((item) => {
        const menuItem = document.createElement("div");
        menuItem.className = "menu-item";

        const itemName = document.createElement("h3");
        itemName.textContent = item.name;

        const itemDescription = document.createElement("p");
        itemDescription.textContent = `Price: ₹${item.price}`;

        const addButton = document.createElement("button");
        addButton.type = "button";
        addButton.textContent = "Add to Cart";
        addButton.addEventListener("click", () => {
            addItem(item.name, item.price);
        });

        menuItem.appendChild(itemName);
        menuItem.appendChild(itemDescription);
        menuItem.appendChild(addButton);

        menu.appendChild(menuItem);
    });
}

// Load menu items when the page loads
window.addEventListener("load", addMenuItems);

// Handle form submission (you would typically send data to the server here)
document.getElementById("order-form").addEventListener("submit", (event) => {
    event.preventDefault();
    const formData = new FormData(document.getElementById("order-form"));
    const tableNumber = document.getElementById("tableNumber").value;
    const cartItems = document.querySelectorAll(".cart-item");

    // Show an alert message
    alert("Order submitted successfully!");

    // Prepare the order data (you can customize this)
    const order = {
        tableNumber: tableNumber,
        items: [],
    };

    cartItems.forEach((item) => {
        const itemName = item.textContent.split(" - ₹")[0];
        const itemPrice = parseFloat(item.textContent.split(" - ₹")[1]);
        order.items.push({ name: itemName, price: itemPrice });
    });

    // Replace this with code to send the order data to your server
    console.log("Simulating order submission...");
    console.log("Order Data:", order);

    // Clear the cart and reset the form (you can customize this)
    document.getElementById("cart-items").innerHTML = "";
    document.getElementById("cart-total").textContent = "₹0.00";
    document.getElementById("tableNumber").value = "";

    // Clear the selectedItems array
    selectedItems.length = 0;

    // Scroll to the top of the page
    window.scrollTo({ top: 0, behavior: "smooth" });
});
