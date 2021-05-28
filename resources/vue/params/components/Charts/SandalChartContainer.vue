<template>
  <div class="container">
    <sandalline-chart
      v-if="loaded"
     />
  </div>
</template>

<script>

export default {
  computed: {
    loaded() {
      return this.$store.state.loadedGirvas;
    }
  },
}

</script>

<style>
  
canvas{

  width:1000px !important;
  height:600px !important;

}



</style>