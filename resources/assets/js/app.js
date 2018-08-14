
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../../node_modules/jquery/dist/jquery.slim.min.js');
require('../../../node_modules/popper.js/dist/popper.min.js');
require('../../../node_modules/bootstrap/dist/js/bootstrap.min.js');
require('../../../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js');
require('../../../node_modules/jquery/dist/jquery.min.js');
// require('../../../node_modules/dataTables.bootstrap4');
// require('../../../node_modules/admin-lte/plugins/font-awesome/font-awesome.min.css');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('delModal', require('./components/delModal.vue'));
const app = new Vue({
    el: '#app'
});

