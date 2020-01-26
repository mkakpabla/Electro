let categories = []
console.log("test")
items = document.querySelectorAll('input[name="categories[]"]')
items.forEach(item => {
    item.addEventListener('change', function (e) {
        e.preventDefault()
        categories = []
        let checkedItems = document.querySelectorAll('input[name="categories[]"]:checked')
        checkedItems.forEach(itemCheck => {
            categories.push(itemCheck.value);
        })

        $.ajax({
            url: '/shop/filter',
            type: 'GET',
            data: {
                categories: categories
            },
            success: function (data) {
                $('#products-store').html(data.products)
                document.querySelector('.store-filter').style.display = 'none'
            }
        })
    })
})
/*
let singleItem = function (item) {
    return `
        <div id="products" class="col-md-4 col-xs-6">
            <div class="product">
                <div class="product-img">
                    <img class="product-cover" src="${item.cover}" alt="" width="263" height="263">
                <!--<div class="product-label">
                        <span class="sale">-30%</span>
                        <span class="new">NEW</span>
                    </div>-->
                </div>
                <div class="product-body">
                    <p class="product-category">${item.category.name}</p>
                    <h3 class="product-name">${item.name}</h3>
                    <h4 class="product-price">${item.price}</h4>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-btns">
                        <a href="#" class="add-to-wishlist"><i class="fa fa-heart-o"></i></a>
                        <a href="/cart/${item.id}/store" class="add-to-cart-btn add-to-compare"><i class="fa fa-shopping-cart"></i></a>
                        <a href="/shop/products/${item.slug}" class="quick-view"><i class="fa fa-eye"></i></a>
                    </div>
                </div>
            </div>
        </div>
    `
}

*/




