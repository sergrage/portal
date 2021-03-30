<template>
    <a id="createPDFbutton"
       @click="createPdf"
       :href="pdfDownloadLink"
       class="btn mt-3 text-white"
       style="background:#ff0000;"
       data-toggle="modal"
       data-target="#exampleModal">
        <i class="far fa-file-pdf" ></i>
        Скачать PDF</a>
</template>

<script>
    export default {
        computed: {
          pdfDownloadLink(){
              return this.$store.getters.downloadLinkPdf;
          }
        },
        methods: {
            createPdf(){
                this.$store.dispatch("createPdfFile", this.$store.state.dateForRequest);
            }
        },
        mounted() {
            console.log('Component safepdf-component.')
        }
    }
</script>
