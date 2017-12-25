const Vue = require('vue')
const BootstrapVue = require('bootstrap-vue')

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