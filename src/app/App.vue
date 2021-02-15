<template>
  <div id="app" class="main" :style="someStyle">   
   <vheader class="header"></vheader>
   <vhero></vhero>
   <posts></posts>
  </div>
</template> 

<script >
import posts from './components/posts';
import vheader from './components/vheader';  
import vhero from './components/vhero';

export default {
 name: 'app',
 components: {
    posts,
    vheader,
    vhero
  },
  
  data: function () {
    return { 
	 someStyle: {
		//background: 'url('+stylesheetDir+'/src/assets/14.png) no-repeat'
	 }

    }
  },
  mounted: function() {    
	  //console.log(stylesheetDir);
  },
  methods: {  
  }
}
</script> 
<style lang='scss' src="../styles/globals.scss"></style>
