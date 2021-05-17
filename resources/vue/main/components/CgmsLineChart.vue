<template>
  <div class="container">
    <cgmsline-chart
      v-if="loaded"
     />
  </div>
</template>

<script>

export default {
  computed: {
    loaded() {
      return this.$store.state.loadedCgms;
    }
  },
}

</script>

  <!-- extends: VueChartJs.Line, -->