<template>

    <div class="m-content">

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head":class="{'alert-accent alert':opinion.id}">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                        <h3 class="m-portlet__head-text">
                            Psikolog Görüşü {{opinion.id ? 'Güncelle' :'Ekle'}}
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" v-on:submit.prevent="onSubmit">
                <div class="m-portlet__body">
                    <input v-model="opinion.client_id=$route.params.clientId" type="hidden">
                    <input v-model="opinion.type=1" type="hidden">
                    <div class="form-group m-form__group">

                        <label for="exampleInputEmail1">
                            Görüş Başlığı
                        </label>
                        <input type="text"  :class="{'m-input--solid':opinion.id}"
                               v-model="opinion.title" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Görüş Başlığı">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleTextarea">
                            Psikolog Görüşü
                        </label>
                        <textarea placeholder="Görüşlerinizi Belirtin..." class="form-control m-input" id="exampleTextarea" rows="3" v-model="opinion.description"></textarea>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">
                            Kaydet
                        </button>
                        <a v-on:click="$router.push({name:'client-common', query:{opTab:1}, params:{clientId:$route.params.clientId}})" class="btn btn-secondary">
                            Vazgeç
                        </a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Portlet-->

        <!--end::Portlet-->
    </div>



</template>

<script>


    export default {


        data: function () {


            return {

                opinion: {},

            }
        },
        methods: {

            onSubmit() {


                if (!this.opinion.id) {

                    this.$store.dispatch("addOpinion", this.opinion).then(() => {

                        this.$router.push({name:'client-common', query:{opTab:1}, params:{clientId:this.$route.params.clientId}})


                    })


                } else {
                    this.$store.dispatch("updateOpinion", this.opinion).then(() => {

                        this.$router.push({name:'client-common', query:{opTab:1}, params:{clientId:this.$route.params.clientId}})
                    });

                }


            },


        },


        created() {
            this.opinion = {
                ...this.$route.params.opinion

            }





        },



        watch:{



        }


    }
</script>

