<template>
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <h3 class="mb-0">Editar lugar</h3>
            </div>
            <div class="card-body">
                <form method="POST" v-on:submit.prevent="onUpdate" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-5">
                            <label for="nombre">Nombre de lugar</label>
                            <div class="form-group" :class="{'has-danger': errors.has('nombre')}">
                                <input type="text" id="nombre" name="nombre" class="form-control form-control-alternative" placeholder="Nombre del lugar"
                                       v-validate="'required'"
                                       v-model="form.nombre">
                                <small class="text-danger">{{ errors.first('nombre') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="encargado">Encargado</label>
                            <div class="form-group" :class="{'has-danger': errors.has('encargado')}">
                                <input type="text" id="encargado" name="encargado" class="form-control form-control-alternative" placeholder="Encargado"
                                       v-validate="'required'"
                                       v-model="form.encargado">
                                <small class="text-danger">{{ errors.first('encargado') }}</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="extension">Extensión</label>
                            <div class="form-group" :class="{'has-danger': errors.has('extension')}">
                                <input type="text" id="extension" name="extension" class="form-control form-control-alternative" placeholder="Extension"
                                       v-validate="'required'"
                                       v-model="form.extension">
                                <small class="text-danger">{{ errors.first('extension') }}</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="descripcion">Descripción</label>
                            <div class="form-group" :class="{'has-danger': errors.has('descripcion')}">
                                <textarea id="descripcion" name="descripcion" class="form-control form-control-alternative" rows="4" placeholder="Escribe descripción del lugar..."
                                          v-validate="'required'"
                                          v-model="form.descripcion"></textarea>
                                <small class="text-danger">{{ errors.first('descripcion') }}</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="longitud">Longitud</label>
                            <div class="form-group" :class="{'has-danger': errors.has('longitud')}">
                                <input type="number" id="longitud" name="longitud" class="form-control form-control-alternative" placeholder="longitud" step="any"
                                       v-validate="'required'"
                                       v-model="form.longitud">
                                <small class="text-danger">{{ errors.first('longitud') }}</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="latitud">Latitud</label>
                            <div class="form-group" :class="{'has-danger': errors.has('latitud')}">
                                <input type="number" id="latitud" name="latitud" class="form-control form-control-alternative" placeholder="latitud" step="any"
                                       v-validate="'required'"
                                       v-model="form.latitud">
                                <small class="text-danger">{{ errors.first('latitud') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="foto">Imagen del lugar (Opcional)</label>
                            <div class="form-group">
                                <input type="file" id="foto" name="foto" class="form-control-file" lang="es"
                                       @change="onImageChange">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form: {
                    nombre:'',
                    descripcion:'',
                    encargado:'',
                    extension:'',
                    longitud:'',
                    latitud:'',
                    foto: null

                }
            }
        },
        created(){
            this.$axios.get(`/place/${this.$route.params.id}/edit`).then(response => {
                this.form = response.data;
                this.form.foto = null;
            });
        },
        methods: {

            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },

            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.form.foto = e.target.result;
                };
                reader.readAsDataURL(file);
            },

            onUpdate(){
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.$axios.patch(`/place/${this.$route.params.id}`, this.form).then(() => {
                            this.$swal(toastSuccess);
                            this.$router.push({name:'place-index'});
                        });
                    } else
                        this.$swal(toastError);

                });
            },
        }
    }
</script>
