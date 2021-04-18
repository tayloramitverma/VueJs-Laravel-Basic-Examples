import shop from '@/api/shop'

export default {

    state: {
        items : []
    },

    getters: {

        availableProducts (state) {
            return state.items.filter(product => product.inventory > 0)
        },

        productIsInStock() {
            return (product) => {
                return product.inventory > 0
            }
        }

    },

    actions: {

        fetchProducts({commit}) {
            // make the call

            return new Promise((resolve) => {
    
                shop.getProducts( products =>{
                    commit('setProducts', products)
                    resolve()
                })
    
            })
    
        }

    },

    mutations: {

        setProducts(state, products) {
            // set and update the products
            state.items = products
        },

        decreamentProductInventory(state, product) {
            product.inventory--
        }
    }

}