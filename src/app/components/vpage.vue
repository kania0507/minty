<template>  
  <article v-if="this.vpage" class="page"> 
    <h3> {{vpage.title.rendered}}</h3>
    <p  v-html="vpage.content.rendered"></p>
    {{ getPostDate(vpage.date) }}
  </article>  
</template>

<script> 

import moment from "moment" 
import axios from "axios";

export default {
  name: 'vpage',
   data() {
    return {
      vpage:  {}
    };
  },
  components: { 
  }, 
  mounted() { 
    
    this.getPost(); 
     console.log(this.vpage);

  },
  methods: {
    getPostDate(date){
      //moment(date).format("lll");
        var ob={
          'day': moment(date).format("Do"), 
          'month':moment(date).format("MMM"),
          'year':moment(date).format("YYYY")
        }; 
          return ob;
      
      }, 
    
   // get page from WPAPI  
   getPost: function() {
      axios
        .get( base_url+"/wp-json/wp/v2/pages?slug=" + this.$route.params.pageSlug )
        .then(response => {
          this.vpage = response.data[0];
          console.log(this.vpage);
        })
        .catch(e => {
          console.log(e);
        });
    }
    
  },
    
}
</script> 
 <style  lang="scss"  src="../../styles/_page.scss"></style>