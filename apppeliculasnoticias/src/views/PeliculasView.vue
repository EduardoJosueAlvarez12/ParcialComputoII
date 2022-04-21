<template>
    <div id="contenido">
    <list-pelicula-component/>
    <br/>
    <hr/>
    <create-pelicula-component @reloadpage="reloadpage" />
  </div>
</template>

<script>
import ListPeliculaComponent from '../components/ListPeliculaComponent.vue';
import CreatePeliculaComponent from '../components/CreatePeliculaComponent.vue'

export default {
    name: 'PeliculasView',
    components: {
        ListPeliculaComponent,
        CreatePeliculaComponent
    },
    methods: {
        reloadpage() {
        window.location.reload();
        },
    },
}
</script>
