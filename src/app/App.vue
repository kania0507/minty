<template>
  <div id="app" class="main" :style="someStyle">  
   <vheader class="header"></vheader>
   <vhero></vhero>     
   <router-view :key="$route.fullPath"></router-view>
   <works v-if="this.checkUrl('/')"></works> 
   <vfooter></vfooter> 
  </div>
</template> 

<script > 
//this.$showWorks&&
import vheader from './components/vheader';  
import vhero from './components/vhero'; 
import works from './components/works';
import vfooter from './components/vfooter';

export default {
 name: 'app',
 components: { 
    vheader,
    vhero,
    works,
    vfooter,
  },
  
  data: function () {
    return {  
	    someStyle: {
		  //background: 'url('+stylesheetDir+'/src/assets/14.png) no-repeat'
	  }, 

    }
  }, 
  methods: {     
  },
  mounted() {
     
  }
}
</script> 
<style lang='scss' src="../styles/all.scss"></style> 
