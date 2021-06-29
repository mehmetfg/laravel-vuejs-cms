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
                <router-link :to="{name:'add-client-appointment'}" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                    <a >
												<span>
																<i class="fa fa-plus "></i>
													<span>
														Hızlı Randevu Ekle
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
                                    Durumu
                                </th>

                                <th>
                                    Randevu  Tarihi
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            <tr>
                                <th>

                                </th>

                                <th style="width: 250px">
                                    <input type="text" v-model="searchName" class="form-control" placeholder="Adı Aramak için yazınız"/>
                                </th>

                                <th>
                                    <input type="text" v-model="searchPsychologist" class="form-control" placeholder="Psikolog Aramak için yazınız"/>
                                </th>
                                <th>

                                    <input type="text" v-model="searchReason" class="form-control"  placeholder="Gelme Nedeni Aramak için yazınız"/>

                                </th>
                                <th>

                                </th>

                                <th>

                                </th>
                                <th>

                                </th>
                            </tr>

                            </thead>
                            <tbody is="transition-group" name="list"  type="transition">

                            <tr v-for="(item, index) in paginateDate" :class="" :key="item.id"  :style="{transitionDelay: (index * 0.1) + 's'}">
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
                                <td data-field="Actions"
                                    class="m-datatable__cell m-datatable__cell--center m-datatable__cell m-datatable__cell--check">




                                   <!-- <router-link
                                            :to="{ name:'edit-appointment', params : {clientId:1, appointment : item}}">

                                        <a class="btn m-btn&#45;&#45;pill m-btn&#45;&#45;air         btn-outline-success">
                                            <i class="la la-edit"></i> Güncelle

                                        </a>
                                    </router-link>-->
                                    <router-link
                                            :to="{ name:'detail-appointment', params : { appointment : item}}">

                                        <a class="btn m-btn--pill m-btn--air    text-white       btn-primary">
                                            <i class="la la-print"></i> Detay

                                        </a>
                                    </router-link>
                                    <router-link
                                            :to="{ name:'edit-appointment', params : {clientId:item.client_id,  id : item.id}}">

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
                        <div class="btn-group m-btn-group m-btn-group--pill" role="group" aria-label="...">
                            <button class="btn btn-primary" @click="prevPage()" :disabled="pageNumber==0">Geri</button>

                            <button class="btn btn-primary" :disabled="pageNumber>=pageCount-1"  @click="nextPage()">ileri</button>
                        </div>
                    </div>

                </div>
                <!--end: Datatable -->
            </div>

        </div>
        </div>


</template>

<script>

    import { mapGetters } from 'vuex'
    export default {


        data: function () {


            return {
            searchName:'',
                searchPsychologist:'',
                searchReason:'',
                pageNumber:0,

                size:15,
            }

        },
        methods: {

            nextPage(){
            this.pageNumber++;
            },
            prevPage(){
            this.pageNumber--;
            },

            deleteAppointment(id) {

                this.$store.dispatch("deleteAppointment", id);

            },


        },

        created() {

                this.$store.dispatch("initAppointments");

        },

        computed: {
            ...mapGetters([
                'appointStatus',
            ]),


            pageCount(){
                let l= this.appointments.length,
                s= this.size;
                return Math.ceil(l/s);

            },
            paginateDate(){
              const start=this.pageNumber*this.size,
                    end=start+this.size;
                  return this.appointments.slice(start, end);
            },
            appointments(){
            return  this.$store.getters.appointments.filter(post=> {

               return (post.name?post.name.toLowerCase().includes(this.searchName.toLowerCase()):'')
                   && (post.psychologist?post.psychologist.toLowerCase().includes(this.searchPsychologist.toLowerCase()):'')
                   && (post.reason?post.reason.toLowerCase().includes(this.searchReason.toLowerCase()):'')

            })

            }



        },



    }

</script>

<style scoped>

</style>