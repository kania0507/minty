<template>  
<div class="post_wrapper" >
  <article v-if="postd" class="single">     
       <header class="single_header" :style="[ postd.featured_media!=0 ? { 'background-image':'url(' + postd._embedded['wp:featuredmedia'][0].source_url   + ')'  } : { }] " >
         
        <h3>{{postd.title.rendered}}</h3>
        <small>	{{ getPostDate(postd.date).day}} {{getPostDate(postd.date).month}} {{getPostDate(postd.date).year }}</small>
       </header>
      <main class="single_main">
          <p  v-html="postd.content.rendered"></p>
      </main>
      
  </article>  
  </div>
</template>

<script> 

import moment from "moment" 
import axios from "axios";

export default {
  name: 'single',
   data() {
    return {
       postUrl: '', 
       postd:  null,
       queryOptions: {
        
        _embed: true //Response should include embedded resources
      }, 
    };
  },
  components: { 
    
  }, 
  mounted() { 
    this.postUrl =  base_url+"/wp-json/wp/v2/posts?slug="+this.$route.params.postSlug;
    this.getPost(); 

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
    
   // get single post from WPAPI when not in props
   getPost: function() {
      axios
       .get(this.postUrl, { params: this.queryOptions }) 
        .then(response => {
          this.postd = response.data[0];
        })
        .catch(e => {
          console.log(e);
        });
    }
  },
   

}
</script> 
 <style  lang="scss"  src="../../styles/_single.scss"> </style>