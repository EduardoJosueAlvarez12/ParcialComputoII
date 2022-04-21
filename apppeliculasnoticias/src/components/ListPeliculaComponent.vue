<template>
  <div>
    <b-table striped hover :items="peliculas" :fields="fields">
      <!-- Botón de editar incluido en la columna de Edit en la tabla -->
      <template v-slot:cell(edit)="data">
        <b-button
          v-b-modal.modal-1
          variant="btn btn-primary"
          @click="editPelicula(data.item)">
          Edit
        </b-button>
      </template>

      <!-- Botón de eliminar incluido en la columna de Delete en la tabla -->
      <template v-slot:cell(delete)="data">
        <b-button variant="btn btn-danger" @click="deletePelicula(data.item)">
          Delete
        </b-button>
      </template>
    </b-table>

    <!-- ventana modal para editar el registro -->
    <div>
      <b-modal id="modal-1" title="BootstrapVue">
        <b-form>
          <b-form-group id="input-group-1" label="Titulo:" label-for="input-1">
            <b-form-input
              id="input-1"
              v-model="selectedPelicula.Titulo"
              placeholder="Ingrese el titulo"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-2" label="Género:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="selectedPelicula.Genero"
              placeholder="Ingrese el género"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Año:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="selectedPelicula.Anio"
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
              v-model="selectedPelicula.Director"
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
              v-model="selectedPelicula.Productor"
              placeholder="Ingrese el productor"
              required
            ></b-form-input>
          </b-form-group>

          <span style="color: red">{{ msg }}</span>
          <br />
          <hr />
          <b-button variant="primary" v-on:click="updatePelicula()"
            >Actualizar</b-button
          >
        </b-form>
      </b-modal>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ListPeliculaComponent",
  data() {
    return {
      peliculas: [],
      selectedPelicula: [],
      fields: [
        {
          key: "id",
          soportable: true,
        },
        {
          key: "Titulo",
          soportable: true,
        },
        {
          key: "Genero",
          soportable: true,
        },
        {
          key: "Anio",
          soportable: true,
        },
        {
          key: "Director",
          soportable: true,
        },
        {
          key: "Productor",
          soportable: true,
        },
        {
          key: "Edit",
          label: "Edit",
        },
        {
          key: "Delete",
          label: "Delete",
        },
      ],
      msg: "",
    };
  },
  created() {
    //Obtenemos los registros de la api
    axios
      .get("http://localhost:8000/api/peliculas")
      .then((response) => {
        this.peliculas = response.data.data;
      })
      .catch((e) => {
        this.errors.push(e);
      });
  },
  methods: {
    deletePelicula(pelicula) {
      axios
        .delete("http://localhost:8000/api/pelicula/" + pelicula.id)
        .then((response) => {
          this.peliculas = this.peliculas.filter((p) => p.id !== pelicula.id);
        })
        .catch((e) => {
          this.errors.push(e);
        });
    },
    editPelicula(pelicula) {
      this.selectedPelicula = pelicula;
    },
    updatePelicula() {
      axios.put("http://localhost:8000/api/pelicula/", this.selectedPelicula);
      if (
        this.selectedPelicula.Titulo != "" &&
        this.selectedPelicula.Genero != "" &&
        this.selectedPelicula.Anio != "" &&
        this.selectedPelicula.Director != "" &&
        this.selectedPelicula.Productor != ""
      ) {
        this.msg = "Datos registrados con éxito";
      } else {
        this.msg = "Se necesita todos los campos rellenos";
      }
    },
  },
};
</script>
