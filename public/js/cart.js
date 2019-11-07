$('#products-store').on('click', '.add-to-cart-btn', function (e) {
    e.preventDefault()
    let url = e.target.getAttribute('href')
    if (url === null) {
       url =  e.target.parentNode.getAttribute('href')
    }
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            let cart =  data.cart
            let items = cart.items
            let results = ''
            items.forEach(item => {
                results += template(item)
            })
            $('.cart-list').html(results)
            $('.count').html(cart.count + ' Articles')
            $('.subtotal').html('Prix du Panier: ' + cart.subtotal)
            $('.qty').html(cart.count)
        }
    })
});

let template = function (item) {
    return `
        <div class="product-widget">
            <div class="product-img">
                <img src="${item.cover}" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-name"><a href="#">${item.name}</a></h3>
                <h4 class="product-price"><span class="qty">${item.qty}x</span>${item.price}</h4>
            </div>
            <a href="" class="delete"><i class="fa fa-close"></i></a>
        </div>
    `
}
