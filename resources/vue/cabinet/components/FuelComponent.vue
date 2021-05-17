<template>
<div class="">

<h2>Топливо ПТЭЦ-13</h2>
<form @submit.prevent="submit_form()" v-if="!form_success">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputFact">Фактический запас</label>
            <input v-model="fields.fact" type="text" class="form-control" id="inputFact" placeholder="Фактический запас">
            <div class="alert alert-danger" v-if="errors && errors.fact">
                {{ errors.fact[0] }}
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="inputNorm">Нормативный запас</label>
            <input v-model="fields.norm" type="text" class="form-control" id="inputNorm" placeholder="Нормативный запас">
            <div class="alert alert-danger" v-if="errors && errors.norm">
                {{ errors.norm[0] }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputDead">Мертвый остаток</label>
        <input v-model="fields.dead" type="text" class="form-control" id="inputDead" placeholder="Мертвый остаток">
        <div class="alert alert-danger" v-if="errors && errors.dead">
            {{ errors.dead[0] }}
        </div>
    </div>
    <div class="form-group">
        <label for="inputWork">Рабочий объем</label>
        <input v-model="fields.work" type="text" class="form-control" id="inputWork" placeholder="Рабочий объем">
        <div class="alert alert-danger" v-if="errors && errors.work">
            {{ errors.work[0] }}
        </div>
    </div>
    <button type="submit" :disabled="form_submit" class="btn btn-primary">Отправить</button>
</form>
<div class="alert alert-success" role="alert" v-else>
    Данные успешно добавлены!
</div>

</div>
</template>

<script>
export default {
    data(){
        return {
            fields: {
                fact: 0,
                norm: 0,
                dead: 0,
                work: 0,
            }
        }
    },
    computed: {
        form_submit() {
            return this.$store.state.form_submit;
        },
        errors () {
            return this.$store.state.errors;
        },
        form_success() {
            return this.$store.state.success;
        }
    },
    methods: {
        submit_form() {
            this.$store.commit('SET_FORM_SUBMIT', true)
            let fields = new FormData()
            for(let key in this.fields) {
                fields.append(key, this.fields[key])
            }
            this.$store.dispatch('postFuelData', fields)
        }
    }
}
</script>

<style>



</style>
