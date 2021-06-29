<template>

    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                        <h3 class="m-portlet__head-text">
                            Yeni Randevu Ekle
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->
            <form class="m-form m-form--fit m-form--label-align-right  " v-on:submit.prevent="onSubmit">
                <div class="m-portlet__body">

                    <div class="form-group m-form__group row">
                        <label class="col-lg-1 col-form-label">
                            Danışan Adı:
                        </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control m-input" placeholder=" Danışan Adı:"  required="required" v-model="appointment.name=client.name">


                        </div>
                        <div class="col-lg-1">
                            <span class="btn btn-sm btn-primary" @click="clientSearch()"><i class="la la-search"></i><i class="fa fa-check" v-show="client.id!=null"></i></span>
                            <span class="btn btn-sm btn-outline-primary" @click="deleteClient()"><i class="fa fa-trash"></i></span>
                        </div>
                        <label class="col-lg-1 col-form-label">
                            Gelme Nedeni:
                        </label>
                        <div class="col-lg-3">
                            <select class="form-control" @change="onchange()" ref="reasonref" v-model="appointment.reason" :required="true">

                                <option v-for="item in reasons"  :value="item.name" class="form-control"  data-id :style="{'background-color':item.color}"
                                        >{{item.name}}

                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-1 col-form-label">
                            Psikolog Seç:
                        </label>
                        <div class="col-lg-3">
                            <select class="form-control" v-model="appointment.psychologist_id"  :required="true">

                                <option v-for="item in psychologists" :value="item.id">{{item.name}}</option>
                            </select>
                        </div>
                        <div class="col-lg-1">
                        </div>
                        <label class="col-lg-1 col-form-label">
                            Cihaz:
                        </label>
                        <div class="col-lg-3">
                            <select class="form-control" v-model="appointment.device" >

                                <option v-for="item in devices"  :value="item" class="form-control">{{item}}

                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-1 col-form-label">
                            Randevu Tarihi:
                        </label>
                        <div class="col-lg-3">
                            <VueCtkDateTimePicker minute-interval="30" required="required"  button-now-translation="Şimdi" format="YYYY-MM-DD HH:mm" label="Tarih & Saat Seç" v-model="appointment.start_date"></VueCtkDateTimePicker>

                            <small class="small alert-danger" v-show="dateError">Lüfen Bu alanı boş bırakmayınız</small>
                        </div>

                        <div class="col-lg-1">
                        </div>
                        <label class="col-lg-1 col-form-label">
                            Açıklama
                        </label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control m-input" placeholder="Açıklama"  v-model="appointment.description">
                        </div>

                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-1 col-form-label">
                            Durum:
                        </label>

                        <div class="col-lg-3">
                            <select class="form-control" v-model="appointment.status">

                                <option v-for="(item, index) in status"  :value="index" class="form-control">{{item}}

                                </option>
                            </select>
                        </div>
                    </div>

                    <!--end::Form-->
                </div> <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions--solid">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <button type="submit" class="btn btn-brand">
                                Kaydet
                            </button>
                            <a v-on:click="$router.go(-1)" class="btn btn-secondary">
                                Vazgeç
                            </a>
                        </div>
                    </div>
                </div>
            </div></form>
        </div>
    </div>


</template>

<script>
    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    import moment from "moment"
    import {tr} from 'vuejs-datepicker/dist/locale'
    import Datepicker from 'vuejs-datepicker';
    export default {

        components:{
            Datepicker,
            VueCtkDateTimePicker,

        },
        data: function () {


            return {
                tr,
                dateError:false,
                appointment: {},

                devices:[],
                reasons:[],
                status:{},


            }
        },
        methods: {

            onchange(){

                console.log(this.$refs.reasonref[this.$refs.reasonref.selectedIndex].style.backgroundColor)
            },

            onSubmit() {



                if (this.appointment.start_date == '' || this.appointment.start_date == null) {

                     this.dateError=true;
                } else {
                    this.dateError=false;

                    this.appointment.backcolor=this.$refs.reasonref[this.$refs.reasonref.selectedIndex].style.backgroundColor
                    this.appointment.start_date = moment(String(this.appointment.start_date)).format('YYYY-MM-DD HH:mm')
                    this.appointment.finish_date = moment(String(this.appointment.start_date)).add(1, 'hours').format('YYYY-MM-DD HH:mm')

                    if (!this.appointment.id) {
                        if(this.client.id==null) {
                            this.$store.dispatch("addAppointmentWithClient", this.appointment).then(() => {

                                this.$router.push("/home")


                            })
                        }else{
                            this.appointment.client_id=this.client.id
                            this.$store.dispatch("addAppointment", this.appointment).then(() => {

                                this.$router.push("/home")


                            })

                        }


                    } else {
                        this.$store.dispatch("updateAppointment", this.appointment).then(() => {

                            this.$router.go(-1)
                        });

                    }


                }


            },
            clientSearch(){

                    this.$store.dispatch("initAppointmentClient", this.appointment.name)

            },
            deleteClient(){

                this.$store.commit("initAppointmentClient", {});
            }


        },


        created() {


            this.$store.dispatch("initUserType", 4);
            this.appointment = {
                ...this.$route.params.appointment

            }
            this.reasons={
                ...this.$store.getters.reasons
            }
            this.devices={

                ...this.$store.getters.devices
            }


            this.status={
                ...this.$store.getters.appointStatus
            }



        },



        computed:{
            psychologists(){

                return this.$store.getters.dealers
            },

            client(){

                return this.$store.getters.appointmenClient
            }

        }


    }
</script>

