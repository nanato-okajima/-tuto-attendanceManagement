require('./bootstrap');

import Vue from 'vue';
import paginate from 'vuejs-paginate';
import Attendances from './components/Attendances.vue';
import AttendanceForm from './components/AttendanceForm.vue';

new Vue({
  el: '#app',
  components: {
    paginate,
    Attendances,
    AttendanceForm
  }
});
