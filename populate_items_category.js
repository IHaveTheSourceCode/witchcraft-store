document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll(".category-card-btn").forEach(category=>{
        category.addEventListener("click", function(){
            let category_name = this.dataset.category;

            fetch("get_category_items.php?item_type=${category_name}")
            .then(response => response.json())
            .then(items => {
                container.innerHTML = "";

                items.forEach(item => {
                    container.appendChild(createElement(item.image_path,
                        item.description, item.price, item.itemID));
                })
            }).catch(error => {
                console.error("Error fetching shop items:", error) 
            })
        })
    })
})