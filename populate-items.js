// creates items and populates home page
const container = document.querySelector("#home-page-products");

function createElement(itemID){
    let itemContainer = document.createElement("div");
    itemContainer.classList.add("home-item-container");
    let imageContainer = document.createElement("div");
    imageContainer.classList.add("home-image-container");
    let image = document.createElement("img");
    image.classList.add("home-image");

    let itemDescription = document.createElement("div");
    itemDescription.classList.add("home-item-description");
    let priceTag = document.createElement("div");
    priceTag.classList.add("home-price-tag");
    let addToCartBtn = document.createElement("button");
    addToCartBtn.classList.add("home-add-to-cart-btn");
}

// 