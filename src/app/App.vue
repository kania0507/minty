<template>
  <div id="app" class="main" :style="someStyle">   
   <vheader class="header"></vheader>
   <vhero></vhero>
   <posts></posts>
   <works v-if=this.$showWorks></works> 
   <footer></footer>
  </div>
</template> 

<script >
import posts from './components/posts';
import vheader from './components/vheader';  
import vhero from './components/vhero';
import footer from './components/footer';
import works from './components/works';

export default {
 name: 'app',
 components: {
    posts,
    vheader,
    vhero,
    footer,
    works
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
    //console.log(this.$showWorks);
  },
  methods: {    

  }
}
</script> 
<style lang='scss' src="../styles/all.scss"></style> 
