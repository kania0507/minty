<template>  
  <article v-if="this.postc" class="post">  
     <router-link :to="{ name:'post', params: {postSlug: postc.slug} }">   
	  
     <figure  :style="[ postc.featured_media!=0 ? { 'background-image':'url(' + postc._embedded['wp:featuredmedia'][0].source_url   + ')'  } : { }] ">
        <div class="date"><span class="card-date-day">{{ getPostDate(postc.date).day }}</span>
		<span class="card-date-month">{{ getPostDate(postc.date).month }}{{ getPostDate(postc.date).year }}</span></div>
        <figcaption>
            <h3> {{postc.title.rendered}}</h3>
            <p  v-html="postc.excerpt.rendered"></p>
		      	 <small>{{ getPostDate(postc.date).day}} {{getPostDate(postc.date).month}} {{getPostDate(postc.date).year }}</small>
        </figcaption>
     </figure>
	 
</router-link>
  </article>  
</template>

<script> 

import moment from "moment" 
import axios from "axios";

export default {
  name: 'post',
   data() {
    return {
      postd:  {}
    };
  },
  components: { 
  },
  props: {
    postc: {
      type: Object,
      required: true
    }
  },
  mounted() { 
    if ( this.postc == null ) this.getPost(); 

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
        .get(
          base_url+"/wp-json/wp/v2/posts?slug=" + this.$route.params.postSlug
        )
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
 <style  lang="scss"  src="../../styles/_post.scss"></style>