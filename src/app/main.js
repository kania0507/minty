import Vue from 'vue'
//import VueRouter from 'vue-router'
import App from './App.vue' 
import VueMq from 'vue-mq';

Vue.use(VueMq, {
  breakpoints: {
    mobile: 450,
    tablet: 900,
    laptop: 1250,
    desktop: Infinity,
  }
});

new Vue({
  el: '#app',
  render: h => h(App)
})
