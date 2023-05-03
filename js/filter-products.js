let selectMenu = document.querySelector("#filter_select");
let container = document.querySelector(".product-container");
let product_list = document.querySelector(".product-list");




selectMenu.addEventListener("change", function() {
    console.log(this.value);


    let categoryName = this.value;
    product_list.innerHTML = null;

    let http = new XMLHttpRequest(); 

    http.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            let out = "";

            for (let item of response) {
                out += `
                <form action="shop.php" method="post">
                    <div class="product-card">
                        <img src="${item.img_url}" alt="Product Image">
                        <h2 class="product-name">${item.name}</h2>
                        <p class="descriere">${item.descriere}</p>
                        <p class="price">${item.price} lei</p>
                        <button class="add-to-cart-btn" onclick="addToCard(${item.product_id})" name="add_to_cart_btn">Add to Cart</button>
                        <input type="hidden" name="product_id" value="${item.product_id}">
                    </div>
                </form>
                `;
            }
            product_list.innerHTML = out;
        }
    }

    http.open('POST', "filter-products.php");
    http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    http.send("category="+categoryName);
});

