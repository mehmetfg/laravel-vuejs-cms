<template>
    <div class="tab-pane" :class="{'active':curTab}" id="cari" role="tabpanel">
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
                <router-link :to="{name:'add-current', params:{clientId:$route.params.clientId}}">
                    <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill text-white">
												<span>
																<i class="fa fa-plus "></i>
													<span>
														Yeni Cari Ekle
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
                            <tbody is="transition-group" name="list" mode="out-in" type="transition">

                            <tr v-for="item in currents" :class="" :key="item.id">
                                <td>

                                    <span class="m-badge m-badge--danger "    >{{item.id}} </span>
                                </td>

                                <td>

                                    <span class="bold "    >{{item.date | formatShift}} </span>
                                </td>
                                <td width="250px">

                                    <span :class="{'m-badge m-badge--wide alert alert-danger ':item.type===1}">{{currentType[item.type]}} </span>

                                </td>
                                <td>            <span class="bold "    >{{item.total | formatCurrency}} </span></td>
                                <td>       </td>
                                <td data-field="Actions"
                                    class="m-datatable__cell m-datatable__cell--center m-datatable__cell m-datatable__cell--check">




                                    <router-link
                                            :to="{ name:'edit-current', params : {clientId:$route.params.clientId, current : item}}">

                                        <a class="btn m-btn--pill m-btn--air         btn-outline-success">
                                            <i class="la la-edit"></i> Güncelle

                                        </a>
                                    </router-link>


                                    <a dataurl="41"
                                       class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                       v-on:click="deleteCurrent(item.id)">
                                        <i class="la la-trash"></i>
                                    </a>

                                </td>
                            </tr>

                            </tbody>
                            <thead>
                            <tr v-show="currents.length>0">
                                <th>

                                </th>

                                <th style="width: 250px">

                                </th>


                                <th>
                                    <span class="m-badge m-badge--wide alert alert-danger "> Borç: {{totalB | formatCurrency }}</span>
                                </th>
                                <th>

                                    <span class="m-badge m-badge--wide alert alert-primary "> Ödenen: {{totalA  | formatCurrency }}</span>
                                </th>
                                <th>
                                   <span class="m-badge m-badge--wide alert alert-info "> Kalan  : {{parseFloat(totalA)-parseFloat(totalB)  | formatCurrency }} TL</span>
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
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

        props:[ 'curTab'],


        data: function () {


            return {


                    toplam:0,
            }

        },
        methods: {


            sumCurrentBalance(){

                  this.currents.reduce(function (sum, current ) {


                        console.log(current.total);

                }, 0);
            },

            deleteCurrent(id) {

                this.$store.dispatch("deleteCurrent", id);
            },


        },

        created() {

            this.$store.dispatch("initClientCurrents", this.$route.params.clientId);


        },

        computed: {
            ...mapGetters([
                'currents',
                'currentType'
            ]),

            totalB:function(){
                var count=0
                for(var i = 0; i < this.arrayB.length; i++)
                {
                    count = count + parseFloat(this.arrayB[i].total);
                }
                    return count
            },
            arrayB: function(){
                return this.currents.filter(item=> {

                   return item.type=='1'

                });
            },
            totalA:function(){
                var count=0
                for(var i = 0; i < this.arrayA.length; i++)
                {
                    count = count + parseFloat(this.arrayA[i].total);
                }
                return count
            },
            arrayA: function(){
                return this.currents.filter(item=> {

                    return item.type=='2'

                });
            },



        },



    }

</script>

<style scoped>

</style>