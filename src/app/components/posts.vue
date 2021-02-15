<template>
    <div class="posts" :class="$mq" :column="$mq | mq({  mobile: 1, tablet: 2,  laptop: 2,  desktop: 2  })">
        <div v-for="(post, index) in posts" :key="index" class="post"   :style="[ post.featured_media!=0 ? { 'backgroundImage': 'url(' + post._embedded['wp:featuredmedia'][0].source_url   + ')', 'background-size': 'cover' } : { 'backgroundColor':'silver'}]" > 
          
             <h3>{{index}}{{ post.title.rendered }} <small>{{ getPostDate(post.date) }} </small></h3>
             {{ post.excerpt.rendered }} <br />Author: {{ post.author }}, Category: {{ post.categories }}
             {{ post.featured_media }} 
              
        </div>
    </div>
</template>

<script>
import axios from  "axios";
import moment from "moment" 

export default {
    name: 'posts',
 	
   data() {
    return {
      // Wordpress Posts Endpoint
      postsUrl: "./wp-json/wp/v2/posts",
      queryOptions: {
        per_page: 10, 
        page: 1, // Current page 
        _embed: true //Response should include embedded resources
      }, 
      posts: [],   // Returned Posts
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
  }
    }
</script>
<style lang="scss" src="../../styles/posts.scss" scope></style>