let previouslySelectedCategory = null;

document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll(".category-card-btn").forEach(category=>{
        category.addEventListener("click", function(){
            let category_name = this.dataset.category;
            if(category_name === previouslySelectedCategory){
                previouslySelectedCategory = null;
                //removes button's active styling
                category.classList.remove("category-card-btn-active");
                category.classList.remove("category-outlined");
                category.querySelector(".category-card-img").classList.remove(".category-card-img-active");
                category.querySelector(".category-card-img").classList.remove("category-card-img-active");
                category.querySelector(".category-card-description").classList.remove("category-card-img-active");

                fetch("fetchShopItems.php")
                .then(response => response.json())
                .then(items => {
                    //saves container's current height so it can transition smoothly
                    let current_height = container.scrollHeight + "px";
                    container.style.height = current_height;
                    container.innerHTML = "";
                    items.forEach(item => {
                        container.appendChild(createElement(item.image_path,
                            item.description, item.price, item.itemID));
                    });
                    setTimeout(() =>{
                        // auto height sets height so elements would fit
                        container.style.height = "auto";
                        let newHeight = container.scrollHeight + "px";
                        container.style.height = current_height;
                        setTimeout(() =>{
                            container.style.height = newHeight;
                        },100);
                    },100);
                }).catch(error => {
                    console.error("Error fetching shop items:", error);
                });
            }else{
                //resets all buttons active stylings
                document.querySelectorAll(".category-card-btn").forEach(btn => {
                    btn.classList.remove("category-card-btn-active");
                    btn.classList.remove("category-outlined");
                    btn.querySelector(".category-card-img").classList.remove("category-card-img-active");
                    btn.querySelector(".category-card-description").classList.remove("category-card-img-active");
                })
                //changes button's styling to active
                category.classList.add("category-card-btn-active");
                category.classList.add("category-outlined");
                category.querySelector(".category-card-img").classList.add("category-card-img-active");
                category.querySelector(".category-card-description").classList.add("category-card-img-active");
                previouslySelectedCategory = category_name;
                fetch(`get_category_items.php?item_type=${encodeURIComponent(category_name)}`)
                .then(response => response.json())
                .then(items => {
                    //saves container's current height so it can transition smoothly
                    let current_height = container.scrollHeight + "px";
                    container.style.height = current_height;
                    container.innerHTML = "";
                    items.forEach(item => {
                        container.appendChild(createElement(item.image_path,
                            item.description, item.price, item.itemID));
                    });
                    setTimeout(() =>{
                        // auto height sets height so elements would fit
                        container.style.height = "auto";
                        let newHeight = container.scrollHeight + "px";
                        container.style.height = current_height;
                        setTimeout(() =>{
                            container.style.height = newHeight;
                        },100);
                    },100);
                }).catch(error => {
                    console.error("Error fetching shop items:", error); 
                })
            }
        })
    })
})