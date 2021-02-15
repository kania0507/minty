<template>
  <div id="app" class="main" :style="someStyle">   
   <vheader class="header"></vheader>
   <posts></posts>
  </div>
</template> 

<script >
import posts from './components/posts';
import vheader from './components/vheader';  

export default {
 name: 'app',
 components: {
    posts,
    vheader 
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
