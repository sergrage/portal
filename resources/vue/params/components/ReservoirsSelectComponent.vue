<template>
    <form action="" class="yearSelect">
        <select v-model="selected" class="form-control">
          <option v-for="(value, name) in reservoirs" :selected="selected" v-bind:value="name">
            {{value}}
          </option>
        </select>
    </form>
</template>

<script>
export default {
    computed: {
      selected: {
        get() {
          return this.$store.state.selectReservoir;
        },
        set(value) {
          // this.$store.dispatch('getDataFromServer', this.$store.state.selectYear)
          this.$store.commit('SET_RESERVOIR', value)
          this.$store.dispatch('getDataFromServer', {dateTo : this.$store.state.selectYear, reservoir: this.$store.state.selectReservoir })
        }
        
      },
      reservoirs() {
        return this.$store.state.reservoirs;
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