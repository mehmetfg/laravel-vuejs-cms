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
                            Danışan  Gözlem Formu {{opinion.id ? 'Güncelle' :'Ekle'}}
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right" v-on:submit.prevent="onSubmit">
                <div class="m-portlet__body">
                    <input v-model="opinion.type=2" type="hidden">
                    <input v-model="opinion.client_id=$route.params.clientId" type="hidden">
                    <div class="form-group m-form__group">

                        <label for="exampleInputEmail1">
                            Tarih
                        </label>
                        <VueCtkDateTimePicker button-now-translation="Şimdi" :only-date="true" formatted="DD.MM.YYYY" label="Tarih" v-model="opinion.date" required></VueCtkDateTimePicker>


                    </div>
                    <div class="form-group m-form__group">

                        <label for="exampleInputEmail1">
                            Tür
                        </label>
                        <select v-model="opinion.title" class="form-control">
                            <option value="Kilo">Kilo</option>
                            <option value="Sigara">Sigara</option>
                            <option value="Alkol">Alkol</option>
                        </select>

                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleTextarea">
                            Yorum
                        </label>
                        <textarea placeholder="Görüşlerinizi Belirtin..." class="form-control m-input" id="exampleTextarea" rows="3" v-model="opinion.description"></textarea>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">
                            Kaydet
                        </button>
                        <a v-on:click="$router.push({name:'client-common', query:{clintOpTab:1}, params:{clientId:this.$route.params.clientId}})" class="btn btn-secondary">
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
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    import moment from "moment"
    import {tr} from 'vuejs-datepicker/dist/locale'

    export default {

        components:{
            VueCtkDateTimePicker,

        },
        data: function () {


            return {
                tr,

                opinion: {},

            }
        },
        methods: {

            onSubmit() {
                this.opinion.date = moment(String(this.opinion.date)).format('YYYY-MM-DD')
                if (!this.opinion.id) {



                    this.$store.dispatch("addOpinion", this.opinion).then(() => {

                        this.$router.push({name:'client-common', query:{clintOpTab:1}, params:{clientId:this.$route.params.clientId}})


                    })


                } else {
                    this.$store.dispatch("updateOpinion", this.opinion).then(() => {

                        this.$router.push({name:'client-common', query:{clintOpTab:1}, params:{clientId:this.$route.params.clientId}})
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

