document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll(".category-card-btn").forEach(category=>{
        category.addEventListener("click", function(){
            let category_name = this.dataset.category;

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
                })
                //calculates new content height and then sets it into container as value in px
                container.style.height = "auto";
                let newHeight = container.scrollHeight + "px";
                container.style.height = current_height;
                setTimeout(() => {
                    container.style.height = newHeight;
                }, 100);
            }).catch(error => {
                console.error("Error fetching shop items:", error) 
            })
        })
    })
})