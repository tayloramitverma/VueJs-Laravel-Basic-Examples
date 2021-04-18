<template>
    <div>
        <h1>Shopping cart</h1>
        <ul>
            <li v-for="product in products" :key="product.id">
                {{product.title}} - {{product.price | currency}} - {{product.quantity}}
            </li>
        </ul>
        <p>Total {{total | currency}}</p>

        <button @click="checkout">Checkout</button>
        <p v-if="checkoutStatus">{{checkoutStatus}}</p>
    </div>
</template>

<script>

import {mapGetters, mapState, mapActions} from 'vuex'

export default {

    computed: {

        ...mapState({
            checkoutStatus : state => state.cart.checkoutStatus
        }),

        ...mapGetters({
            products: 'cartProducts',
            total: 'cartTotal'
        })
    },

    methods: {
        ...mapActions({
            checkout: 'checkout'
        })
        
    }

    /*computed: {
        products () {
            return this.$store.getters.cartProducts
        },

        total () {
            return this.$store.getters.cartTotal
        }
    }*/
    
}
</script>

<style scoped>

</style>