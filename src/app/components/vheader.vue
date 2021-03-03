<template> 
    <div class="container"  :class="$mq" :column="$mq | mq({  mobile: 1, tablet: 2,  laptop: 2,  desktop: 2  })">
        <div class="logo"> 
            <router-link to="/"><img class="logo" :src='this.logo' alt="logo" /></router-link>
        </div>
    <div class="navbar">

    <div class="icon-bar" @click="ShowFunction">
        <i></i>
        <i></i> 
        <i></i> 
    </div>

    <ul id="nav-lists">
        <li class="close"><span @click="HideFunction">×</span></li> 
        <li  v-for="(menu, index) in menus" :key="index" class="list_elem"> <!-- <router-link :to="{ name:'vheader', params: { path: menu.ID }}"  > <!-- :to="{  name:'vheader', params: {ip: menu.ip }}" >   -->
          <a :href=menu.url class="menu_link">{{ menu.title }}</a> </li> 
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
      menusUrl: base_url+"/wp-json/wp/v2/menu",
      queryOptions: {
        per_page: 10, // Only retrieve the 10 most recent blog posts.
        page: 1, // Current page of the collection.
        _embed: true //Response should include embedded resources.
      },
      // Returned menus in an Array
      menus: [],  
      logo: blogLogo
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
    console.log(this.$router); 
  },
}
</script> 
<style lang='scss' src="../../styles/_vheader.scss"></style>
