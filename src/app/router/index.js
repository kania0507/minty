import Vue from 'vue';
import Router from 'vue-router';

// Components 
import Posts from '../components/Posts.vue';
import Single from '../components/Single.vue'; 
import Works from '../components/Works.vue';
import Work from '../components/Work.vue';  
import Vpage from '../components/Vpage.vue'; 
import Vheader from '../components/Vheader.vue'; 

Vue.use(Router);

const router = new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Posts,
    },
    {
      path: '/posts',
      name: 'posts',
      component: Posts,
    },
    {
      path: '/blog',
      name: 'blog',
      component: Posts,
    },
    {
      path: '/works',
      name: 'works',
      component: Works,
    },
     {
      path: '/work',
      name: 'work-all',
      component: Works,
    },
    {
      path: '/work/:postSlug',
      name: 'work',
      component: Work,
    },
    { 
      path: '/:postSlug',
      name: 'post',
      type:'post',
      component: Single,
    },
    /*
    { 
      path: './:year/:month/:day/:postSlug',
      name: 'singleFull',
      component: Single,
    },*/
    {
      path: '/:pageSlug',
      name: 'vpage',
      type:'page',
      component: Vpage,
    },
    {
      name: 'vheader',
//      base: '',
      path: '?p=:path',
      component: Vheader,
      
    }
    
  ],
  mode: 'history',
  base: base_path,


});

export default router;