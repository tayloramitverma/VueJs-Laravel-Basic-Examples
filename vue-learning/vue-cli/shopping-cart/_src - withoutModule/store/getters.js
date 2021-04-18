export default { //computed properties
        
    availableProducts (state) {
        return state.products.filter(product => product.inventory > 0)
    },

    cartProducts (state) {
        return state.cart.map(cartItem => {
            const product = state.products.find(product => product.id === cartItem.id)

            return {
                title : product.title,
                price: product.price,
                quantity: cartItem.quantity,
                id: cartItem.id
            }

        })
    },

    cartTotal (state, getters) {
        return  getters.cartProducts.reduce((total, product) => total + product.price * product.quantity, 0 )
    },

    productIsInStock() {
        return (product) => {
            return product.inventory > 0
        }
    }

}