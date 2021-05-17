<template>
    <form action="" class="yearSelect">
        <select v-model="selected" class="form-control">
          <option v-for="year in years" v-bind:value="year.cgms" :selected="selected">
            {{ year.cgms }}
          </option>
        </select>
    </form>
</template>

<script>
export default {
    computed: {
      selected: {
        get() {
          return this.$store.state.cgmsYear;
        },
        set(value) {
          this.$store.commit('SET_CGMSYEAR', value)
          this.$store.dispatch('getDataFromServer', this.$store.state.cgmsYear)
        }
        
      },
      years() {
        return this.$store.state.cgmsYears;
      }
    },
    methods: {
        getYear() {

        }
    }
}
</script>


<style scoped>
    .yearSelect {
        width: 400px;
        display: inline-block;
        margin-top: 20px;
    }
</style>