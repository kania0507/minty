import Vue from 'vue'
import router from './router';
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

//
Vue.prototype.$showWorks = true;

Vue.mixin({
  methods: {
    checkUrl: function(comp) {
      if(   this.$route.path == '/' || this.$route.path == '/'+comp)
        return true;
      return false;
    }
  }
}); 


new Vue({
  el: '#app', 
  router, 
  render: h => h(App)
})
