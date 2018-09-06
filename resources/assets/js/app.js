
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
// require('../../../node_modules/jquery-ui/ui/jquery-1-7.js');
require('../../../node_modules/jquery-mask-plugin/dist/jquery.mask.min.js');
require('../../../node_modules/bootstrap-select/dist/js/bootstrap-select.min.js');
require('../../../node_modules/jquery-validation/dist/jquery.validate.js');
require('../../../node_modules/jquery-validation/dist/jquery.validate.min.js');

require('../../../node_modules/admin-lte/dist/js/adminlte.js');
require('../../../node_modules/admin-lte/plugins/sparkline/jquery.sparkline.min.js');
require('../../../node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
require('../../../node_modules/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
require('../../../node_modules/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js');
require('../../../node_modules/admin-lte/plugins/chartjs-old/Chart.min.js');
require('../../../node_modules/admin-lte/dist/js/pages/dashboard2.js');
require('../../../node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js');
// require('../../../node_modules/')
// require('../../../node_modules/')


/*
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>*/


// require('../../../node_modules/materialize-css/dist/js/materialize.js');

// require('../../../node_modules/dataTables.bootstrap4');
// require('../../../node_modules/admin-lte/plugins/font-awesome/font-awesome.min.css');
window.Vue = require('vue');
window.swal = require('sweetalert2');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('delModal', require('./components/delModal.vue'));
const app = new Vue({
    el: '#app'
});

