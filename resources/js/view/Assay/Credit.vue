<template>
    <div class="m-content">
        <div class="col-md-12">

            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head " :class="{'alert-accent alert':this.assay.id}">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text ">
                            <i class="fa fa-flask fa-2x"></i>    Tahlil {{assay.id ? 'Güncelle' :'Ekle'}}

                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">

                    </div>
                </div>
                <!--begin::Form-->


                <form v-on:submit.prevent="onSubmit"
                      class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed myform"
                      method="post"
                      enctype="multipart/form-data">
            <input type="hidden" v-model="assay.client_id=$route.params.clientId">

                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">
                                Tahlil Tipi
                            </label>

                           <select v-model="assay.type" class="form-control">
                               <option selected>Seçiniz</option>
                               <option v-for="item in assayTypes" :value="item">{{item}}</option>
                           </select>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">
                                Tahlil Durumu
                            </label>
                            <select v-model="assay.status" class="form-control">
                                <option selected>Seçiniz</option>
                                <option v-for="item in assayStatus" :value="item">{{item}}</option>
                            </select>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleTextarea">
                                Açıklama
                            </label>
                            <textarea placeholder="Görüşlerinizi Belirtin..." class="form-control m-input" id="exampleTextarea" rows="3" v-model="assay.description"></textarea>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">

                            <button type="submit" class="btn btn-primary">
                                Kaydet
                            </button>
                            <a v-on:click="$router.push({name:'client-common', query:{assayTab:1}, params:{clientId:$route.params.clientId}})" class="btn btn-secondary">
                                Vazgeç
                            </a>

                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>


        </div>


    </div>


</template>

<script>


    export default {


        data: function () {


            return {

                assay: {},
                assayTypes:[],
                assayStatus:[]

            }
        },
        methods: {

            onSubmit() {

                if (!this.assay.id) {
                    this.$store.dispatch("addAssay", this.assay).then(() => {

                        this.$router.push({name:'client-common', query:{assayTab:1}, params:{clientId:this.$route.params.clientId}})


                    })


                } else {
                    this.$store.dispatch("updateAssay", this.assay).then(() => {

                        this.$router.push({name:'client-common', query:{assayTab:1}, params:{clientId:this.$route.params.clientId}})
                    });

                }


            },


        },


        created() {
            this.assay = {
                ...this.$route.params.assay

            }
            this.assayTypes={

                ...this.$store.getters.assayTypes
            }
            this.assayStatus={

                ...this.$store.getters.assayStatus
            }





        },



        watch:{



        }


    }
</script>

