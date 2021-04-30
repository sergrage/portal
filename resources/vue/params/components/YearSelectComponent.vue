<template>
    <form action="" class="yearSelect">
        <select class="form-control" v-model="selected">
          <option selected>2021</option>
          <option>2020</option>
          <option>2019</option>
          <option>2018</option>
        </select>
        {{year}}
    </form>

</template>

<script>
export default {
    data() {
        return {
            selected: ''
        }
    },
    computed: {
      year() {
        return this.selected;
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