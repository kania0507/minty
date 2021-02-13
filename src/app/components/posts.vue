<template>
    <div class="posts" >
         <div class="post" v-for="(post, index) in posts" :key="index">
            {{ post.featured_media }}
            <img v-if="post.featured_media!=0" :src="post._embedded['wp:featuredmedia'][0].source_url" class="img-responsive" />
             <h3>{{ post.title.rendered }} <small>{{ getPostDate(post.date) }} </small></h3>
             {{ post.excerpt.rendered }} <br />Author: {{ post.author }}, Category: {{ post.categories }}
             
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
        per_page: 10, // Only retrieve the 10 most recent blog posts.
        page: 1, // Current page of the collection.
        _embed: true //Response should include embedded resources.
      },
      // Returned Posts in an Array
      posts: [],  
    };
  },
  methods: {
    // Get Recent Posts From WordPress Site
    getRecentPosts() {
      axios
        .get(this.postsUrl, { params: this.queryOptions })
        .then(response => {
          this.posts = response.data;
         
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
<style lang="scss" src="../../styles/posts.scss"></style>