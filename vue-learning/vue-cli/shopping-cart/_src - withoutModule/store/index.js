import Vuex from 'vuex'
import Vue from 'vue'

import actions from './actions'
import mutations from './mutations'
import getters  from './getters'
import state from './state'

Vue.use(Vuex)

export default new Vuex.Store({

    state: state,

    getters: getters,

    actions: actions,

    mutations: mutations


})