<template>
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="text-lg-right">
                    <router-link class="btn btn-primary" :to="{path: '/place/create'}">Nuevo</router-link>
                </div>
                <div class="form-group align-content-end">
                    <input type="text" id="search" name="search" v-model="search" class="form-control col-md-5" placeholder="buscar...">
                </div>
                <h3 class="mb-0">Lugares registrados</h3>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Lugar</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Encargado</th>
                        <th scope="col">Extensión</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody v-if="filteredPlace.length !== 0">
                    <tr v-for="place in filteredPlace">
                        <th scope="row">
                            <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                    <img alt="Image placeholder">
                                </a>
                                <div class="media-body">
                                    <span class="mb-0 text-sm"></span>
                                </div>
                            </div>
                        </th>
                        <td>{{place.nombre}}</td>
                        <td>{{place.descripcion}}</td>
                        <td>{{place.encargado}}</td>
                        <td>{{place.extension}}</td>
                        <td class="text-right">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">Editar</a>
                                    <a class="dropdown-item" v-on:click="onDelete(place.id, place)">Eliminar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                    <tr v-else>
                        <td><strong>No se encotraron resultados.</strong></td>
                    </tr>
                </table>

            </div>
            <div class="card-footer py-4">

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data(){
          return {
              places:[],
              search:''
          }
        },
        created() {
            this.$axios.get('/place').then((response) => {
                this.places = response.data;
            });
        },
        methods: {
            onDelete(id, element){
                this.$swal(swalConfirmDelete).then(result =>{
                    if (result.value){
                        let url = '/place/'.concat(id);
                        this.$axios.delete(url).then(()=>{
                            this.$swal(toastDelete);
                            this.places.splice(this.places.indexOf(element), 1)
                        })
                    }
                });
            }
        },
        computed: {
            filteredPlace(){
                return this.places.filter((place) => {
                    return place.nombre.match(this.search);
                });
            }
        }
    }
</script>
