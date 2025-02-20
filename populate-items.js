// creates items and populates home page
const container = document.querySelector("#home-page-products");

function createElement(imagePath, description, price, itemID){
    const itemContainer = document.createElement("div");
    itemContainer.classList.add("home-item-container");

    const imageContainer = document.createElement("div");
    imageContainer.classList.add("home-image-container");

    const image = document.createElement("img");
    image.classList.add("home-image");
    image.src = imagePath;

    const itemDescription = document.createElement("div");
    itemDescription.classList.add("home-item-description");
    itemDescription.textContent = description;

    const bottomContainer = document.createElement("div");
    bottomContainer.classList.add("home-bottom-container");

    const priceTag = document.createElement("div");
    priceTag.classList.add("home-price-tag");
    priceTag.textContent = price;

    const addToCartBtn = document.createElement("button");
    addToCartBtn.classList.add("home-add-to-cart-btn");

    imageContainer.appendChild(image);
    bottomContainer.append(priceTag, addToCartBtn);
    itemContainer.append(imageContainer, itemDescription, bottomContainer);

    return itemContainer;
}

fetch('fetchShopItems.php').then(res => res.json())
.then(items => {
    items.forEach(item => {
        container.appendChild(createElement(item.itemID, item.image_path,
             item.description, item.price));
    })
}).catch(error => {
    console.error("Error fetching shop items:", error);
})