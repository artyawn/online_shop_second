export default {
    methods: {
        addToCart() {
            let cart = localStorage.getItem('cart')
            let newProduct = [
                {
                    'product': this.product,
                    'qty': 1
                }
            ]
            if (!cart) {
                console.log(this.product)
                localStorage.setItem('cart', JSON.stringify(newProduct));
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if (productInCart.product.id === this.product.id) {
                        productInCart.qty = Number(productInCart.qty) + 1
                        newProduct = null
                    }
                })
                Array.prototype.push.apply(cart, newProduct)
                localStorage.setItem('cart', JSON.stringify(cart))
            }
        }
    }
}
