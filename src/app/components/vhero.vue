<template>
    <div class="vhero"><h2 :class="$mq" :column="$mq | mq({  mobile: 1, tablet: 2,  laptop: 2,  desktop: 2  })">{{ this.blogDesc }}  </h2></div>
</template>
<script>
export default {
    name: 'vhero',
    data: function () {
        return { 
         blogDesc

    }
  },
}
</script>
<style lang="scss" src="../../styles/_vhero.scss" ></style>