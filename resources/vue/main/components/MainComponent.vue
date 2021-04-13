<template>
    <table class="table table-bordered largeText">
<!--   <thead>
    <tr>
      <th scope="col">Основные параметры филиала</th>
      <th scope="col">Значение</th>
    </tr>
  </thead> -->
    <tbody>
    <tr class="generation">
      <td>Суммарная генерация</td>
      <td>
          <span>{{power}} МВт</span>
      </td>
    </tr>
    <tr>
      <td>Температура воздуха Петрозаводск</td>
      <td>
        <span>{{temperature}} C<sup>o</sup></span>
    </td>
    </tr>
  </tbody>
  </table>
</template>

<script>
export default {
    computed: {
        power() {
            return this.$store.state.power;
        },
        temperature() {
            return this.$store.state.temperature;
        } 
    }
}
</script>

<style scoped>
    .largeText {
        font-size: 2rem;
    }
    .generation {
        background: #007bff;
        color: #fff;
    }
</style>
