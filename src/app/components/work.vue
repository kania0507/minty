<template>    
  <div class="work_wrapper"  >
  <article v-if="this.work" class="single">    
       <header class="single_header" :style="[ work.featured_media!=0 ? { 'background-image':'url(' + work._embedded['wp:featuredmedia'][0].source_url   + ')'  } : { }] " >
         
        <h3>{{ work.title.rendered }}</h3>
        <small>	{{ getPostDate(work.date).day}} {{getPostDate(work.date).month}} {{getPostDate(work.date).year }}</small>
       </header>
      <main class="single_main">
          <p  v-html="work.content.rendered"></p>
      </main> 
   </article>  
  </div> 
</template>

<script> 

import moment from "moment" 
import axios from "axios";

export default {
  name: 'work',
   data() {
    return {
      work:  {},
      queryOptions: {  
        _embed: true //Response should include embedded resources
      }, 
    };
  },
  components: { 
  },
  props: {/*
    workc: {
      type: Object,
      required: true
    }*/
  },
  mounted() {  
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
        .get( base_url+"/wp-json/wp/v2/works?slug='" + this.$route.params.postSlug + "'", { params: this.queryOptions } )
        .then(response => {
          this.work = response.data[0];
          console.log(this.work);
        })
        .catch(e => {
          console.log(e);
        });
    }
    
  }, 

}
</script> 
 <style  lang="scss"  src="../../styles/_work.scss"></style>