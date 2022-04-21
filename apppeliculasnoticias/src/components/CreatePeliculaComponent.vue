<template>
  <div id="contenido" class="container">
    <h1>Formulario de Peliculas</h1>
    <div style="width: 40%; margin: auto">
      <b-form>
        <b-form-group id="input-group-1" label="Titulo:" label-for="input-1">
          <b-form-input
            id="input-1"
            v-model="peliculaData.Titulo"
            placeholder="Ingrese el título"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-2"
          label="Genero:"
          label-for="input-2"
        >
          <b-form-input
            id="input-2"
            v-model="peliculaData.Genero"
            placeholder="Ingrese el genero"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-3"
          label="Año:"
          label-for="input-3"
        >
          <b-form-input
            id="input-3"
            v-model="peliculaData.Anio"
            placeholder="Ingrese el año"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-4"
          label="Director:"
          label-for="input-4"
        >
          <b-form-input
            id="input-4"
            v-model="peliculaData.Director"
            placeholder="Ingrese el director"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-4"
          label="Productor:"
          label-for="input-4"
        >
          <b-form-input
            id="input-4"
            v-model="peliculaData.Productor"
            placeholder="Ingrese el productor"
            required
          ></b-form-input>
        </b-form-group>

        <span style="color: red">{{ msg }}</span>
        <br />
        <b-button variant="primary" v-on:click="create()">Crear</b-button>
        <b-button variant="success" v-on:click="reload()">Recargar</b-button>
      </b-form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CreatePeliculaComponent",
  data() {
    return {
      peliculaData: {
        Titulo: "",
        Genero: "",
        Anio: "",
        Director: "",
        Productor: "",
      },
      msg: "",
    };
  },
  methods: {
    create: function () {
      axios.post("http://localhost:8000/api/pelicula", this.peliculaData);
      if (
        this.peliculaData.Titulo != "" &&
        this.peliculaData.Genero != "" &&
        this.peliculaData.Anio != "" &&
        this.peliculaData.Director != "" &&
        this.peliculaData.Director != ""
      ) {
        this.msg = "Datos registrados con éxito";
      } else {
        this.msg = "Se necesita todos los campos rellenos";
      }
    },
    reload: function () {
      this.$emit("reloadpage");
    },
  },
};
</script>