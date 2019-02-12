/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
require('./tooltip');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueQRCodeComponent from 'vue-qrcode-component'

Vue.component('input-counter', require('./components/InputCounter.vue').default);
Vue.component('qr-code', VueQRCodeComponent)

const app = new Vue({
    el: '#app'
});

/**
 * Add scripts for the application to work.
 */



