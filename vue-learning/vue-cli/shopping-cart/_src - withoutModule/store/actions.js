import shop from '@/api/shop'

export default {

    fetchProducts({commit}) {
        // make the call
        return new Promise((resolve) => {

            shop.getProducts( products =>{
                commit('setProducts', products)
                resolve()
            })

        })

    },

    addProductToCart({state, getters, commit}, product) {
        if(getters.productIsInStock(product)) {
            
            const cartItem = state.cart.find(item => item.id === product.id )

            if(!cartItem) {
                commit('pushProductToCart', product.id)
            }else {
                commit('increamentItemQuantity', cartItem)
            }

            commit('decreamentProductInventory', product)

        }else {
            //show out of stock product message
        }
    },

    checkout ({state, commit}) {
        shop.buyProducts(

            state.cart,

            () => {
                commit('emptyCart')
                commit('setCheckoutStatus', 'success')
            },
            () => {
                commit('setCheckoutStatus', 'fail')
            }
        )
    }


}