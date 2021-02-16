<template> 
    <div class="container"  :class="$mq" :column="$mq | mq({  mobile: 1, tablet: 2,  laptop: 2,  desktop: 2  })">
        <div class="logo">
            <a href="#"><img src="https://www.w3jar.com/wp-content/uploads/2019/05/microsoft.png" alt="logo"></a>
        </div>
    <div class="navbar">

    <div class="icon-bar" @click="ShowFunction">
        <i></i>
        <i></i> 
        <i></i> 
    </div>

    <ul id="nav-lists">
        <li class="close"><span @click="HideFunction">×</span></li> 
        <li  v-for="(menu, index) in menus" :key="index" class="list_elem"><a :href=menu.url class="menu_link">{{ menu.title }}</a></li> 
    </ul>

    </div>
    </div>

  
</template> 

<script >  

import axios from  "axios";
export default {
 name: 'vheader', 
  
  data: function () {
    return {  
        navpng: stylesheetDir+'/src/assets/Navigation.png',
         // Wordpress Menus Endpoint
      menusUrl: "./wp-json/wp/v2/menu",
      queryOptions: {
        per_page: 10, // Only retrieve the 10 most recent blog posts.
        page: 1, // Current page of the collection.
        _embed: true //Response should include embedded resources.
      },
      // Returned menus in an Array
      menus: [],  
     
    }
  },
 
  methods: {  
        ShowFunction() {
            var navList = document.getElementById("nav-lists");
            navList.classList.add("_Menus-show");
        },

         HideFunction(){
            var navList = document.getElementById("nav-lists");
            navList.classList.remove("_Menus-show");
        },
     // Get Recent Posts From WordPress Site
     getRecentMenus() {
      axios
        .get(this.menusUrl, { //params: this.queryOptions 
        })
        .then(response => {
          this.menus = response.data;
          console.log("MENUS: ");
          console.log(this.menus);
        })
        .catch(error => {
          console.log(error);
        });
     }, 

  },
   mounted: function() {    
	//console.log(stylesheetDir);
    
    this.menus=[];
    this.getRecentMenus();
  },
}
</script> 
<style lang='scss' src="../../styles/vheader.scss" scope></style>
