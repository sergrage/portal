<template>
<table class="table table-striped table-sm table-bordered">
        <thead>
        <tr align="center" style="background: #007bff;color: #fff;">
            <th scope="col">Фактический запас</th>
            <th scope="col">Нормативный запас</th>
            <th scope="col" style="background: #000;">Мертвый остаток</th>
            <th scope="col">Рабочий объем</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <tr>
            <td>{{fuels.fact}}</td>
            <td>{{fuels.norm}}</td>
            <td>{{fuels.dead}}</td>
            <td>{{fuels.work}}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    computed: {
        fuels() {
            return this.$store.state.fuels;
        }
    },
    methods: {

    }
}
</script>

<style>



</style>
