<template>
    <div id="contenido">
    <list-noticia-component/>
    <br/>
    <hr/>
    <create-noticia-component @reloadpage="reloadpage" />
  </div>
</template>

<script>
import ListNoticiaComponent from '../components/ListNoticiaComponent.vue';
import CreateNoticiaComponent from '../components/CreateNoticiaComponent.vue'

export default {
    name: 'NoticiasView',
    components: {
        ListNoticiaComponent,
        CreateNoticiaComponent
    },
    methods: {
        reloadpage() {
        window.location.reload();
        },
    },
}
</script>
