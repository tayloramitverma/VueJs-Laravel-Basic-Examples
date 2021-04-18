<template>
    <div>
        <h1>Product List</h1>
        <img v-if="loading" src="https://i.imgur.com/JfPpwOA.gif" />
      <ul v-else>
          <li v-for="product in products" v-bind:key="product.id"> 
              {{ product.title }} [ {{ product.price | currency }} ] - {{product.inventory}}
                <button 
                    :disabled="!productIsInStock(product)"
                    @click="addProductToCart(product)"
                >
                Add to Cart
              </button>
          </li>
      </ul>
    </div>
</template>

<script>

import {mapState, mapGetters, mapActions} from 'vuex'

export default {

    data() {
        return {
            loading : false
        }
    },

    methods: {

        ...mapActions({
            fetchProducts : 'fetchProducts',
            addProductToCart : 'addProductToCart'
        })

        // addProductToCart(product) {

        //     this.$store.dispatch('addProductToCart', product)
        // }

    },

    computed: {

        ...mapState({
            products: state => state.products.items
        }),

        ...mapGetters({
            productIsInStock: 'productIsInStock'
        })

        // products() {
        //     return this.$store.state.products
        // },

        // productIsInStock() {
        //     return this.$store.getters.productIsInStock
        // }


    },

    created () {
        this.loading = true
        this.fetchProducts().then(() => 
            this.loading = false
        )
    }
    
}
</script>

<style scoped>

</style>
