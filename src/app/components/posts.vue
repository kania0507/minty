<template>
<div class="posts_wrapper" v-if="this.posts.length>0">
  <div class="posts_header">Posts</div>
  <div class="gridder">
    <post  v-for="(post, index) in posts" :key=post.id  :postc=post  :class="{  'featured':  post.sticky }"    ></post>
  </div>
  <div class="showMore" v-if="this.checkUrl('/')">  <router-link to="/posts"><button class="showMoreBtn">Show more</button></router-link></div>
    
</div>
</template>

<script>
import axios from  "axios";
import post  from './post' 

export default {
    name: 'posts', 
 	
   data() {
    return {
      // Wordpress Posts Endpoint
      postsUrl: base_url+"/wp-json/wp/v2/posts",
      queryOptions: {
        //per_page: 10,  
        page: 1, // Current page 
        _embed: true //Response should include embedded resources
      }, 
      posts: [],   // Returned Posts
    };
  },  
  components: {
    post
  }, 
  mounted() { 

    if (this.checkUrl('/') ) this.queryOptions.per_page=3;  
    this.posts=[];
    this.getRecentPosts();
      
  },
  methods: {
    // Get Recent Posts from WP API
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
   
  },
  
  }
</script>
<style lang="scss" src="../../styles/_posts.scss"  >
 </style>