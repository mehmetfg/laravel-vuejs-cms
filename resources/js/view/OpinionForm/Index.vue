<template>
    <div class="tab-pane" :class="{'active': clintOpTab}" id="formgorusler" role="tabpanel">
    <div class="m-portlet m-portlet--tab">

        <div class="m-portlet__head " :class="">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">

                        Danışan  Gözlem
                    </h3>

                </div>
            </div>
            <div class="m-portlet__head-tools">
                <router-link :to="{name:'form-add-opinion', params:{clientId:$route.params.clientId}}">
                    <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill text-white">
												<span>
																<i class="fa fa-plus "></i>
													<span>
														Yeni   Danışan Gözlem Ekle
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
                                <th>
                                    Tarih
                                </th>
                                <th style="width: 250px">
                              Başlık
                                </th>

                                <th>
                                    Açıklama
                                </th>

                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody is="transition-group" name="list" mode="out-in" type="transition">

                            <tr v-for="item in formOpinions" :class="" :key="item.id">
                                <td>

                                    <span class="m-badge m-badge--danger "    >{{item.id}} </span>
                                </td>
                                <td>

                                    <span class="bold "    >{{item.date | formatShift}} </span>
                                </td>
                                <td>

                                   <span class="bold "    >{{item.title}} </span>
                                </td>
                                <td>

                                    <span class="bold "    >{{item.description}} </span>
                                </td>


                                <td data-field="Actions"
                                    class="m-datatable__cell m-datatable__cell--center m-datatable__cell m-datatable__cell--check">




                                    <router-link
                                            :to="{ name:'form-edit-opinion', params : {clientId:$route.params.clientId,  opinion : item}}">

                                        <a class="btn m-btn--pill m-btn--air         btn-outline-success">
                                            <i class="la la-edit"></i> Güncelle

                                        </a>
                                    </router-link>


                                    <a dataurl="41"
                                       class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                       v-on:click="deleteOpinion(item.id)">
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
        props:['clintOpTab'],

        data: function () {


            return {

                pType:this.$route.params.type

            }

        },
        methods: {



            deleteOpinion(id) {

                this.$store.dispatch("deleteOpinion", id);

            },
            isActiveSetter(opinion) {

                opinion.isActive = document.querySelector('#mycheckbox' + opinion.id).checked;

                this.$store.dispatch("opinionIsActiveSetter", opinion);
            }

        },

        created() {

                this.$store.dispatch("initFormOpinions", this.$route.params.clientId);


        },

        computed: {
            ...mapGetters([
                 'formOpinions'

            ]),



        },



    }

</script>

<style scoped>

</style>