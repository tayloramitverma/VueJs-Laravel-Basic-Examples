import shop from '@/api/shop'

export default {

    state: {

        // id, quantity
        items : [],
        checkoutStatus : null
    },

    getters : {

        cartProducts (state, getters, rootState) {
            
            return state.items.map(cartItem => {
                const product = rootState.products.items.find(product => product.id === cartItem.id)

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
        }

    },

    actions : {

        addProductToCart({state, getters, commit, rootState}, product) {
            if(getters.productIsInStock(product)) {
                
                const cartItem = state.items.find(item => item.id === product.id )
    
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
    
                state.items,
    
                () => {
                    commit('emptyCart')
                    commit('setCheckoutStatus', 'success')
                },
                () => {
                    commit('setCheckoutStatus', 'fail')
                }
            )
        }

    },

    mutations: {

        pushProductToCart(state, productId) {
            state.items.push({
                id: productId,
                quantity: 1
            })
        },

        increamentItemQuantity(state, cartItem) {
            cartItem.quantity++
        },

        setCheckoutStatus(state, status) {
            state.checkoutStatus = status
        },

        emptyCart(state) {
            state.items = []
        }

    }


}