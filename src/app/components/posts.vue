<template>
<div>
  <div class="posts_header">Posts</div>
    <div class="posts" :class="$mq" :column="$mq | mq({  mobile: 1, tablet: 2,  laptop: 2,  desktop: 2  })">
      
        <div v-for="(post, index) in posts" :key="index" class="post"   :style="[ post.featured_media!=0 ? { 'backgroundImage': 'linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(117, 19, 93, 0.73)), ' 
        +'url(' + post._embedded['wp:featuredmedia'][0].source_url   + ')', 'background-size': 'cover' } : { }]" 
        :class="$mq" :column="$mq | mq({  mobile: 1, tablet: 2,  laptop: 2,  desktop: 2  })" > 
            <span class="bottom_line">
             <a :href="post.link"><h2>{{ post.title.rendered }} </h2></a>
             <p class="pexcerpt"><small>{{ getPostDate(post.date) }} </small><br /> {{ post.excerpt.rendered }} Author: {{ post.author }}, Category: {{ post.categories }}
             {{ post.featured_media }} </p>
              </span>
        </div>
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
        per_page: 6, 
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