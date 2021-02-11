<template>
  <div id="app" class="main" :style="someStyle">  
   <h2>Ello App 1</h2>
   	<div class="header"  ></div> 
  </div>
</template> 
<script >  
export default {
 name: 'app',
 components: {
    
  },
  
  data: function () {
    return { 
	 someStyle: {
		background: 'url('+stylesheetDir+'/src/assets/14.png) no-repeat'
	 }

    }
  },
  mounted: function() {    
	console.log(stylesheetDir);
  },
  methods: {  
  }
}
</script>
<style lang='scss' src="../styles/app.scss"></style>
