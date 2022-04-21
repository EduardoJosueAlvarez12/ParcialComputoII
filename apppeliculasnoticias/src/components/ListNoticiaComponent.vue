<template>
  <div>
    <b-table striped hover :items="noticias" :fields="fields">
      <!-- Botón de editar incluido en la columna de Edit en la tabla -->
      <template v-slot:cell(edit)="data">
        <b-button
          v-b-modal.modal-1
          variant="btn btn-primary"
          @click="editNoticia(data.item)">
          Edit
        </b-button>
      </template>

      <!-- Botón de eliminar incluido en la columna de Delete en la tabla -->
      <template v-slot:cell(delete)="data">
        <b-button variant="btn btn-danger" @click="deleteNoticia(data.item)">
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
              v-model="selectedNoticia.Titulo"
              placeholder="Ingrese el titulo"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-2" label="Descripcion:" label-for="input-2">
            <b-form-input
              id="input-2"
              v-model="selectedNoticia.Descripcion"
              placeholder="Ingrese la descripcion"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group id="input-group-3" label="Año:" label-for="input-3">
            <b-form-input
              id="input-3"
              v-model="selectedNoticia.Anio"
              placeholder="Ingrese el año"
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
              v-model="selectedNoticia.Escritor"
              placeholder="Ingrese el nombre del escritor"
              required
            ></b-form-input>
          </b-form-group>

          

          <span style="color: red">{{ msg }}</span>
          <br />
          <hr />
          <b-button variant="primary" v-on:click="updateNoticia()"
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
  name: "ListNoticiaComponent",
  data() {
    return {
      noticias: [],
      selectedNoticia: [],
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
          key: "Descripcion",
          soportable: true,
        },
        {
          key: "Anio",
          soportable: true,
        },
        {
          key: "Escritor",
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
      .get("http://localhost:8000/api/noticias")
      .then((response) => {
        this.noticias = response.data.data;
      })
      .catch((e) => {
        this.errors.push(e);
      });
  },
  methods: {
    deleteNoticia(noticia) {
      axios
        .delete("http://localhost:8000/api/noticia/" + noticia.id)
        .then((response) => {
          this.noticias = this.noticias.filter((p) => p.id !== noticia.id);
        })
        .catch((e) => {
          this.errors.push(e);
        });
    },
    editNoticia(noticia) {
      this.selectedNoticia = noticia;
    },
    updateNoticia() {
      axios.put("http://localhost:8000/api/noticia/", this.selectedNoticia);
      if (
        this.selectedNoticia.Titulo != "" &&
        this.selectedNoticia.Descripcion != "" &&
        this.selectedNoticia.Anio != "" &&
        this.selectedNoticia.Escritor != "" 
      ) {
        this.msg = "Datos registrados con éxito";
      } else {
        this.msg = "Se necesita todos los campos rellenos";
      }
    },
  },
};
</script>
