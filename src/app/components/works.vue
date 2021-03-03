<template>
<div class="works_wrapper" v-if="this.posts.length>0">
  <div class="posts_header">Works</div>
    <div class="works"> 
 
 <carousel :per-page="3" :navigate-to="someLocalProperty" :mouse-drag="true"> 
    <slide v-for="(post, index) in this.posts" :key="index"  class="slide"> <!-- :workc=post -->
       <router-link :to="{ name:'work', params: {postSlug: post.slug} }">  
        <p><img :src="post._embedded['wp:featuredmedia'][0].source_url" class="img-responsive" /></p>
        <h3>{{ post.title.rendered }}</h3>
        </router-link>
    </slide> 

  </carousel>
    </div><!-- /end works -->

  <div class="showMore" v-if="this.checkUrl('/')"><router-link to="/works"><button class="showMoreBtn">Show more</button></router-link></div>
    </div>
</template>

<script>
import axios from  "axios";
import moment from "moment" ; 
import { Carousel, Slide } from 'vue-carousel';

export default {
    name: 'works', 
 	
   data() {
    return {
      // Wordpress Posts Endpoint
      postsUrl: '', 
      queryOptions: { 
        per_page: 10, 
        page: 1, // Current page 
        _embed: true //Response should include embedded resources
      }, 
      posts: [],   // Returned Posts
      options: {
          currentPage: 0
        }
    };
  }, 
  components: {
    Carousel,
      Slide
    },
   mounted() {
      this.postsUrl = base_url+"/wp-json/wp/v2/works";
      //if (this.checkUrl('works')) this.queryOptions.per_page=10; else  this.queryOptions.per_page=5; 
      this.getRecentPosts();
      
  },
  methods: {
    // Get Recent Works from WP API
    getRecentPosts() {
      axios
        .get(this.postsUrl, { params: this.queryOptions })
        .then(response => {
          this.posts = response.data; 
        })
        .catch(error => {
          console.log(error);
        });
    },
    getPostDate(date){
        return moment(date).format("lll");
    }
   
  },
 
  
    }
</script>
<style lang="scss" src="../../styles/_works.scss" ></style>