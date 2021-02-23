<template>
<div class="posts_wrapper">
  <div class="posts_header">Posts</div>
  <div class="gridder">
    <post  v-for="(post, index) in posts" :key="index"   :postc=post  ></post>
    </div>
  <div class="showMore"><button class="showMoreBtn">Show more</button></div>
    

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
      postsUrl: "./wp-json/wp/v2/posts",
      queryOptions: {
        per_page: 10, 
        page: 1, // Current page 
        _embed: true //Response should include embedded resources
      }, 
      posts: [],   // Returned Posts
    };
  },  
  components: {
    post
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
   
  },
  mounted() {
     
    this.posts=[];
    this.getRecentPosts();
  }
  }
</script>
<style lang="scss" src="../../styles/_posts.scss"  ></style>