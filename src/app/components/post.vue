<template> 
  <article> 
	<a :href="postc.link">
     <figure  :style="[ postc.featured_media!=0 ? { 'background-image':'url(' + postc._embedded['wp:featuredmedia'][0].source_url   + ')'} : { }] " >
        <div class="date"><span class="card-date-day">{{ getPostDate(postc.date).day }}</span>
		<span class="card-date-month">{{ getPostDate(postc.date).month }}{{ getPostDate(postc.date).year }}</span></div>
        <figcaption>
            <h3> <span>{{postc.title.rendered}}</span></h3>
            <p  v-html="postc.excerpt.rendered"></p>
			{{ getPostDate(postc.date).day }}
        </figcaption>
     </figure>
	</a> 

  </article>
</template>

<script> 

import moment from "moment" 

export default {
  name: 'post',
  components: { 
  },
  props: {
    postc: {
      type: Object,
      required: true
    }
  },
  mounted() {
    console.log('POSTC');
    console.log(this.postc);
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
		
    } 
  }
}
</script> 
 <style  lang="scss"  src="../../styles/_post.scss"></style>