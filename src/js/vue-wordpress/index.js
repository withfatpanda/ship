const Vue = require('vue')
const BootstrapVue = require('bootstrap-vue')

// @see https://bootstrap-vue.js.org/
Vue.use(BootstrapVue)

let instance = null

module.exports = {
  init () {
    if (!instance) {
      instance = new Vue({
        el: '#page',
        // store,
        // router
      })
    }
    return instance
  }
}