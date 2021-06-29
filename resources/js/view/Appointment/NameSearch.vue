<template>

    <div class="m-portlet m-portlet--tab">

        <div class="m-portlet__head " :class="">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Randevular

                    </h3>

                </div>
            </div>
            <div class="m-portlet__head-tools">

            </div>
        </div>
        <div class="m-portlet m-portlet--mobile">

            <div class="m-portlet__body">
                <!--begin: Search Form -->

                <!--end: Search Form -->
                <!--begin: Datatable -->
                <!--begin: Datatable -->
                <div class="m-section">

                    <div class="m-section__content"  id="printMe">
                        <table class="table">
                            <thead>

                            <tr>
                                <th>
                                    #
                                </th>

                                <th style="width: 250px">
                                    Danışan Adı
                                </th>

                                <th>
                                    Psikolog
                                </th>
                                <th>
                                    Gelme Nedeni
                                </th>
                                <th>
                                    Durumu
                                </th>

                                <th>
                                    Randevu  Tarihi
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>


                            </thead>
                            <tbody is="transition-group" name="list"  type="transition">

                            <tr v-for="(item, index) in appointments" :class="" :key="item.id"  :style="{transitionDelay: (index * 0.1) + 's'}">
                                <td >

                                    <span class="m-badge m-badge--danger "    >{{item.id}} </span>
                                </td>

                                <td>

                                   <span class="bold "    >{{item.name}} </span>
                                </td>
                                <td>

                                    <span class="bold "    >{{item.psychologist}} </span>
                                </td>
                                <td>

                                    <span class="bold "    >{{item.reason}} </span>
                                </td>
                                <td>

                                    <span  :class="{'m-badge m-badge--danger m-badge--wide':  item.status===2 }" >{{appointStatus[item.status]}} </span>
                                </td>
                                <td>

                                    <span    ><i class="fa fa-calendar" ></i> Tarih:
                                     {{item.start_date  | formatShift}} </span>
                                    <br>
                                    <span   > <i class="fa 	fa-clock-o" ></i> Saat:
                                        {{(new Date(item.start_date)).getHours()}}:{{(new Date(item.start_date)).getMinutes()}} </span>
                                </td>
                            <td>
                                <router-link
                                        :to="{ name:'client-common', query:{appointTab:1}, params : { clientId : item.client_id}}">

                                    <a class="btn m-btn--pill m-btn--air  text-white          btn-danger">
                                        <i class="fa fa-cubes"></i>       Danışan İşlemleri

                                    </a>
                                </router-link>
                                <router-link
                                        :to="{ name:'edit-appointment', params : {clientId:item.client_id,  id : item.id}}">

                                    <a class="btn m-btn--pill m-btn--air         btn-outline-success">
                                        <i class="la la-edit"></i> Güncelle

                                    </a>
                                </router-link>
                            </td>
                            </tr>c

                            </tbody>



                        </table>

                    </div>
                    <button type="button" v-on:click="print" class="btn btn-primary" v-show="appointments.length>0">
                        <i class="la la-print"></i> Yazdır
                    </button>
                </div>
                <!--end: Datatable -->
            </div>

        </div>
        </div>


</template>

<script>
    import {tr} from 'vuejs-datepicker/dist/locale'
    import Datepicker from 'vuejs-datepicker';
    import { mapGetters } from 'vuex'
    export default {

        components:{
            Datepicker,
        },
        data: function () {


            return {
            tr,
                start_date:'',
                finish_date:'',
            searchName:'',


            }

        },
        methods: {

            onDate:function(){




            },

            deleteAppointment(id) {

                this.$store.dispatch("deleteAppointment", id);

            },
            print(){

                this.$htmlToPaper('printMe')
            }


        },

        created() {
                this.$store.dispatch("initAppointmentWithName", {name:this.$route.query.name})
        },

        computed: {
            ...mapGetters([
                'appointStatus',
            ]),



            appointments(){
            return  this.$store.getters.appointments;
            }



        },



    }

</script>

<style scoped>

</style>