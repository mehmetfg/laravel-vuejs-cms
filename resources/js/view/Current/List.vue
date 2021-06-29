<template>
    <div class="tab-pane" id="cari" role="tabpanel">
    <div class="m-portlet m-portlet--tab">

        <div class="m-portlet__head " :class="">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
Cari Hareketler

                    </h3>

                </div>
            </div>
            <div class="m-portlet__head-tools">
                <form v-on:submit.prevent="onDate()">
                    <div class="row">
                        <div class="col-md-3">

                            <datepicker :language="tr"  input-class="form-control"  placeholder="Başlangıç Tarih Seç" v-model="startDate" :bootstrapStyling="true"></datepicker>
                        </div>
                        <div class="col-md-3">

                            <datepicker :language="tr"  input-class="form-control"  placeholder="Bitiş Tarih Seç" v-model="finishDate" :bootstrapStyling="true"></datepicker>
                        </div>
                        <div class="col-md-3">

                            <button  class="btn btn-primary btn-block">Ara</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="m-portlet m-portlet--mobile">

            <div class="m-portlet__body">
                <!--begin: Search Form -->

                <!--end: Search Form -->
                <!--begin: Datatable -->
                <!--begin: Datatable -->
                <div class="m-section">

                    <div class="m-section__content" id="printMe">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>

                                <th style="width: 250px">
                                    Adı
                                </th>
                                <th style="width: 250px">
                                    Tarih
                                </th>
                                <th>
                                    Cari Hareket Tipi
                                </th>
                                <th>
                                    İşlem Tutarı
                                </th>
                                <th>

                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody is="transition-group" name="list" mode="out-in" type="transition" appear>

                            <tr v-for="item in currents" :class="" :key="item.id">
                                <td>

                                    <span class="m-badge m-badge--danger "    >{{item.id}} </span>
                                </td>
                                <td>

                                    <span class="m-badge m-badge--danger "    >{{item.name}} </span>
                                </td>
                                <td>

                                    <span class="bold "    >{{item.date | formatShift}} </span>
                                </td>
                                <td width="250px">

                                    <span :class="{'m-badge m-badge--wide alert alert-danger ': item.type==1}"    >{{currentType[item.type]}} </span>


                                </td>
                                <td>            <span class="bold "    >{{item.total}} </span></td>
                                <td>       </td>
                                <td data-field="Actions"
                                    class="m-datatable__cell m-datatable__cell--center m-datatable__cell m-datatable__cell--check">


<!--

                                    <router-link
                                            :to="{ name:'edit-current', params : {clientId:1, current : item}}">

                                        <a class="btn m-btn&#45;&#45;pill m-btn&#45;&#45;air         btn-outline-success">
                                            <i class="la la-edit"></i> Güncelle

                                        </a>
                                    </router-link>-->


                                    <a dataurl="41"
                                       class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                       v-on:click="deleteCurrent(item.id)">
                                        <i class="la la-trash"></i>
                                    </a>

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <button type="button" v-on:click="print" class="btn btn-primary" v-show="currents.length>0">
                        <i class="la la-print"></i> Yazdır
                    </button>
                </div>
                <!--end: Datatable -->
            </div>

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
            startDate:'',
                finishDate:''


            }

        },
        methods: {
            print(){

                this.$htmlToPaper('printMe')
            },

            onDate(){

              this.$store.dispatch("initCurrentWithBeetweenDate", {start:moment(String(this.startDate)).format('YYYY-MM-DD'), finish:moment(String(this.finishDate)).format('YYYY-MM-DD')})
            },
            deleteCurrent(id) {

                this.$store.dispatch("deleteCurrent", id);

            },


        },

        created() {

            this.$store.dispatch("initCurrents");


        },

        computed: {
            ...mapGetters([
                'currents',
                'currentType'

            ]),



        },



    }

</script>

<style scoped>

</style>