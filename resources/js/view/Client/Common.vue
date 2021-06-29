<template>
    <div class="m-content">
        <div class="m-portlet m-portlet--tabs">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{client.name}}
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs-line m-tabs-line--right" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link "  data-toggle="tab" href="#information" role="tab">
                                <i class="fa fa-user"></i>
                                Kişisel Bilgiler
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" :class="{'active':formTab}" data-toggle="tab" href="#formlar" role="tab">
                                <i class="flaticon-list-2"></i>
                                Formlar
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link " :class="{'active':appointTab}"  data-toggle="tab" href="#randevular" role="tab">
                                <i class="flaticon-time-3"></i>
                                Randevular
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" :class="{'active':clintOpTab}"  href="#formgorusler" role="tab">
                                <i class="flaticon-comment"></i>
                                Danışan Gözlem Formu
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" :class="{'active':opTab}"  href="#gorusler" role="tab">
                                <i class="flaticon-comment"></i>
                                Psikolog Görüşleri
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" :class="{'active':assayTab}"  href="#tahliller" role="tab">
                                <i class="fa fa-flask"></i>
                                Tahliller
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" :class="{'active':curTab}"   href="#cari" role="tab">
                                <i class="fa fa-money"></i>
                                Cari Hareketler
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

                <div class="tab-content">
                    <div class="tab-pane " id="information" role="tabpanel">
                        <div class="m-portlet__head " :class="">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Kişi Bilgileri

                                    </h3>

                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <router-link
                                        :to="{ name:'edit-client', params : {client : client}}">

                                    <a class="btn m-btn--pill m-btn--air         btn-outline-success">
                                        <i class="la la-edit"></i> Kişi Bilgisini Güncelle

                                    </a>
                                </router-link>
                            </div>
                        </div>
                 <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>
                                        Ad Soyad:       <b>{{client.name}}</b>
                                    </label>


                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        Email: <b>{{client.email}}</b>
                                    </label>


                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        Telefon: <b>{{client.phone}}</b>
                                    </label>


                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label class="">
                                        İş veya Ev Telefonu: <b>{{client.home_phone}}</b>
                                    </label>


                                </div>
                                <div class="col-lg-4">
                                    <label>
                                        İl:  <b>{{client.city}}</b>
                                    </label>

                                </div>
                                <div class="col-lg-4">
                                    <label>
                                        Bize Nasıl Ulaştınız: <b>{{client.contact}}</b>
                                    </label>

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label class="">
                                        Meslek: <b>{{client.job}}</b>
                                    </label>

                                </div>
                                <div class="col-lg-4">
                                    <label>
                                        Yaş: <b>{{client.age}}</b>
                                    </label>


                                </div>
                                <div class="col-lg-4">
                                    <label>

                                    </label>


                                </div>
                            </div>
                 </div>
                    </div>



                   <appointment :appointTab="appointTab"></appointment>


                    <opinion :opTab="opTab"></opinion>


                        <assay :assayTab="assayTab"></assay>
                    <current :curTab="curTab" ></current>
                    <forms :formTab="formTab"></forms>
                    <clientOpnionForms :clintOpTab="clintOpTab"></clientOpnionForms>
                </div>
                <hr>



        <!--end::Portlet-->
    </div>

    </div>

</template>

<script>

import  appointment from "../Appointment/Index"
import opinion from "../Opinion/Index"
import assay from "../Assay/Index"
import current from "../Current/Index"
import forms from "../Forms/Credit"
import clientOpnionForms from "../OpinionForm/Index"
    export default {

        components:{

            clientOpnionForms,
            forms,
            current,
            appointment,
            opinion,
            assay
        },
        data: function () {


            return {

                curTab:false,
                formTab:false,
                appointTab:true,
                assayTab:false,
                opTab:false,
                clintOpTab:false,


            }
        },
        methods: {




        },


        created() {
            this.$store.dispatch("initFormWithClient", this.$route.params.clientId);
            let routed=this.$route.query
            this.curTab=routed.curTab
             this.formTab=routed.formTab
                this.appointTab=routed.appointTab
                this.assayTab=routed.assayTab
            this.opTab=routed.opTab
            this.clintOpTab=routed.clintOpTab
            this.$store.dispatch("initClient",this.$route.params.clientId)





        },



     computed:{

            client(){

                return {
                    ...this.$store.getters.client
                }

            }
     }


    }
</script>

