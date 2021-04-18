
export default {

    setProducts(state, products) {
        // set and update the products
        state.products = products
    },

    pushProductToCart(state, productId) {
        state.cart.push({
            id: productId,
            quantity: 1
        })
    },

    increamentItemQuantity(state, cartItem) {
        cartItem.quantity++
    },

    decreamentProductInventory(state, product) {
        product.inventory--
    },

    setCheckoutStatus(state, status) {
        state.checkoutStatus = status
    },

    emptyCart(state) {
        state.cart = []
    }
}