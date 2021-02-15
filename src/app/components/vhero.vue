<template>
    <div class="vhero"><h2 :class="$mq" :column="$mq | mq({  mobile: 1, tablet: 2,  laptop: 2,  desktop: 2  })">"Code is a poetry"  </h2></div>
</template>
<script>
export default {
    name: 'vhero',
}
</script>
<style lang="scss" src="../../styles/vhero.scss" scope></style>