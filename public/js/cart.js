let cart = []
document.querySelectorAll('.js-add-to-cart').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault()
        let productDom = btn.parentNode.parentNode.parentNode
        let product = {
            name: productDom.querySelector('.product-name').textContent,
            price: productDom.querySelector('.product-price').textContent,
            cover: productDom.querySelector('.product-cover').src,
            quantity: 1
        }

        document.querySelector('.cart-list').insertAdjacentHTML('beforeend', productTemplate(product))
    })
})


function productTemplate(product) {
    return `<div class="product-widget">
                <div class="product-img">
                    <img src="${product.cover}" alt="">
                </div>
                <div class="product-body">
                    <h3 class="product-name">${product.name}</h3>
                    <h4 class="product-price"><span class="qty">${product.quantity}x</span>${product.price}</h4>
                </div>
                <button class="delete"><i class="fa fa-close"></i></button>
            </div>`
}
