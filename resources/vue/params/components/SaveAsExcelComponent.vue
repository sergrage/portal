<template>
    <a :href="excelDownloadLink"
       class="btn text-white"
       style="background:#1D6F42;">
        <i class="far fa-file-excel"></i>
        Скачать Excel</a>
</template>

<script>
export default {
    computed: {
        excelDownloadLink(){
            return this.$store.getters.downloadLinkExcel;
        }
    }
}
</script>
