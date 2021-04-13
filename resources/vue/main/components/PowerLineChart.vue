<template>
  <div class="container">
    <line-chart
      v-if="loaded"
     />
  </div>
</template>

<script>

export default {
  computed: {
    loaded() {
      return this.$store.state.loaded;
    }
  },
}

</script>

  <!-- extends: VueChartJs.Line, -->