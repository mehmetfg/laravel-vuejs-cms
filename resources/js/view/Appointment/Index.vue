<template>
    <div class="tab-pane" :class="{'active':appointTab}" id="randevular" role="tabpanel">
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
                <router-link :to="{name:'add-appointment', params:{clientId:$route.params.clientId}}">
                    <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill text-white">
												<span>
																<i class="fa fa-plus "></i>
													<span>
														Yeni Randevu Ekle
													</span>
												</span>
                    </a></router-link>
            </div>
        </div>
        <div class="m-portlet m-portlet--mobile">

            <div class="m-portlet__body">
                <!--begin: Search Form -->

                <!--end: Search Form -->
                <!--begin: Datatable -->
                <!--begin: Datatable -->
                <div class="m-section">

                    <div class="m-section__content">
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
                                    Durum
                                </th>
                                <th>
                               Randevu  Tarihi
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody is="transition-group" name="list-enter" mode="out-in" type="transition">

                            <tr v-for="(item, index) in appointments" :class="" :key="item.id" :style="{transitionDelay: (index * 0.1) + 's'}">
                                <td>

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

                                    <span  :class="{'m-badge m-badge--wide alert alert-danger ':  item.status===2 }" >{{appointStatus[item.status]}} </span>
                                </td>
                                <td>

                                    <span    ><i class="fa fa-calendar" ></i> Tarih:
                                     {{item.start_date  | formatShift}} </span>
                                    <br>
                                    <span   > <i class="fa 	fa-clock-o" ></i> Saat:
                                        {{(new Date(item.start_date)).getHours()}}:{{(new Date(item.start_date)).getMinutes()}} </span>
                                </td>
                                <td data-field="Actions"
                                    class="m-datatable__cell m-datatable__cell--center m-datatable__cell m-datatable__cell--check">




                                    <router-link
                                            :to="{ name:'edit-appointment', params : {clientId:$route.params.clientId,  id : item.id}}">

                                        <a class="btn m-btn--pill m-btn--air         btn-outline-success">
                                            <i class="la la-edit"></i> Güncelle

                                        </a>
                                    </router-link>
                                    <a dataurl="41"
                                       class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                       v-on:click="deleteAppointment(item.id)">
                                        <i class="la la-trash"></i>
                                    </a>


                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!--end: Datatable -->
            </div>

        </div>
        </div>
    </div>

</template>

<script>

    import { mapGetters } from 'vuex'
    export default {

        props:['appointTab'],

        data: function () {


            return {



            }

        },
        methods: {


            deleteAppointment(id) {

                this.$store.dispatch("deleteAppointment", id);

            },


        },

        created() {

                this.$store.dispatch("initClientAppointments", this.$route.params.clientId);


        },

        computed: {
            ...mapGetters([
                 'appointments',
                'appointStatus'

            ]),



        },



    }

</script>

<style scoped>

</style>