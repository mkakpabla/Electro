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
            reloadCart(cart)
        }
    })
});
$('.cart-list').on('click', '.delete', function (e) {
    e.preventDefault()
    let url = e.target.getAttribute('href')
    let target = e.target
    if (url === null) {
        url =  e.target.parentNode.getAttribute('href')
        target = e.target.parentNode
    }
    $.ajax({
        url: url,
        type: 'GET',
        success: function (data) {
            reloadCart(data)
        }
    })
})

let reloadCart = function(cart) {
    let results = ''
    let items = cart.items
    if (cart.count !== 0) {
        items.forEach(item => {
            results += template(item)
        })
        $('.cart-list').html(results)
        $('.count').html(cart.count + ' Articles')
        $('.subtotal').html('Prix du Panier: ' + cart.subtotal)
        $('.qty').html(cart.count)
    } else {
        $('.cart-list').html('Panier Vide')
        $('.count').html(cart.count + ' Articles')
        $('.subtotal').html('Prix du Panier: ' + cart.subtotal)
        $('.qty').html(cart.count)
    }

}

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
            <a href="/cart/${item.rowId}/delete" class="delete"><i class="fa fa-close"></i></a>
        </div>
    `
}
