<template>
  <div id="app" class="main" :style="someStyle">   
   <vheader class="header"></vheader>
   <vhero></vhero>
   <posts></posts>
   <footer></footer>
  </div>
</template> 

<script >
import posts from './components/posts';
import vheader from './components/vheader';  
import vhero from './components/vhero';
import footer from './components/footer';

export default {
 name: 'app',
 components: {
    posts,
    vheader,
    vhero,
    footer
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
