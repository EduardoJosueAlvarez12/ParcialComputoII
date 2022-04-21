<template>
  <div id="contenido" class="container">
    <h1>Formulario de Noticias</h1>
    <div style="width: 40%; margin: auto">
      <b-form>
        <b-form-group id="input-group-1" label="Titulo:" label-for="input-1">
          <b-form-input
            id="input-1"
            v-model="noticiaData.Titulo"
            placeholder="Ingrese el título"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-2"
          label="Descripcion:"
          label-for="input-2"
        >
          <b-form-input
            id="input-2"
            v-model="noticiaData.Descripcion"
            placeholder="Ingrese la descripcion"
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
            v-model="noticiaData.Anio"
            placeholder="Ingrese la año"
            required
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-4"
          label="Escritor:"
          label-for="input-4"
        >
          <b-form-input
            id="input-4"
            v-model="noticiaData.Escritor"
            placeholder="Ingrese el escritor"
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
  name: "CreateNoticiaComponent",
  data() {
    return {
      noticiaData: {
        Titulo: "",
        Descripcion: "",
        Anio: "",
        Escritor: "",
      },
      msg: "",
    };
  },
  methods: {
    create: function () {
      axios.post("http://localhost:8000/api/noticia", this.noticiaData);
      if (
        this.noticiaData.Titulo != "" &&
        this.noticiaData.Descripcion != "" &&
        this.noticiaData.Anio != "" &&
        this.noticiaData.Escritor != "" 
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