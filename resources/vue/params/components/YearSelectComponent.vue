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
          return this.$store.state.selectYear;
        },
        set(value) {
          this.$store.commit('SET_SELECT_YEAR', value)
          this.$store.dispatch('getDataFromServer', { dateTo : this.$store.state.selectYear, reservoir: this.$store.state.selectReservoir })
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