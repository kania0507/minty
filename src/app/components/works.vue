<template>
<div class="works_wrapper">
  <div class="posts_header">Works</div>
    <div class="works"  > 
 
 <carousel :per-page="3" :navigate-to="someLocalProperty" :mouse-drag="true">
    <slide v-for="(post, index) in posts" :key="index"   :workc=post class="slide"> 
        <p><img :src="post._embedded['wp:featuredmedia'][0].source_url" class="img-responsive" /></p>
        <h3>{{ post.title.rendered }}</h3>
    </slide> 
  </carousel>
 
 
     
    </div><!-- /end works -->

  <div class="showMore"><button class="showMoreBtn">Show more</button></div>
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
      postsUrl: "./wp-json/wp/v2/works",
      queryOptions: {
        per_page: 4, 
        page: 1, // Current page 
        _embed: true //Response should include embedded resources
      }, 
      posts: [],   // Returned Posts
      options: {
          currentPage: 0
        }
    };
  }, 
  methods: {
    // Get Recent Posts from WP API
    getRecentPosts() {
      axios
        .get(this.postsUrl, { params: this.queryOptions })
        .then(response => {
          this.posts = response.data;
          console.log('POSTS: ');
          console.log(this.posts);
        })
        .catch(error => {
          console.log(error);
        });
    },
    getPostDate(date){
        return moment(date).format("lll");
    }
   
  },
  mounted() {
     
    this.posts=[];
    this.getRecentPosts();
  },
 components: {
   Carousel,
    Slide
  }
    }
</script>
<style lang="scss" src="../../styles/_works.scss" ></style>