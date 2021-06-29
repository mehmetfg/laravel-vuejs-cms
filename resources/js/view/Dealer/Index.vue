<template>

    <div class="m-portlet m-portlet--tab">

        <div class="m-portlet__head " :class="">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">

                    Kurumlar
                    </h3>

                </div>
            </div>
            <div class="m-portlet__head-tools">
                <router-link :to="{name:'add-dealer'}">
                    <a class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill text-white">
												<span>
																<i class="fa fa-plus "></i>
													<span>
														Yeni Kurum Ekle
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
                                <th >
                                    Durum
                                </th>
                                <th style="width: 250px">
                                Bayi Adı
                                </th>

                                <th>
                                    Yetkili Adı
                                </th>
                                <th>
                                    Kullanıcı Bilgileri
                                </th>
                                <th>
                                    İşlemler
                                </th>
                            </tr>
                            </thead>
                            <tbody is="transition-group" name="list-enter" mode="out-in" type="transition">

                            <tr v-for="item in dealers" :class="" :key="item.id">
                                <td>

                                    <span class="m-badge m-badge--danger "    >{{item.id}} </span>
                                </td>
                                <td>
                                        <span class="m-switch m-switch--outline m-switch--icon m-switch--accent">
																		<label>
																		<input type="checkbox"
                                                                               v-bind:checked="item.isActive"
                                                                               v-on:change="isActiveSetter(item)"
                                                                               :id="'mycheckbox'+item.id">
																	    		<span></span>
																		</label>
																	</span>
                                </td>
                                <td>

                                   <span class="bold "    >{{item.name}} </span>
                                </td>
                                <td>

                                    <span class="bold "    >{{item.authorized}} </span>
                                </td>
                                <td>

                                    <span  ><i class="fa fa-mail-reply"></i> {{item.email}} </span>
                                    <br>
                                    <span   ><i class="fa fa-user-secret"></i> {{item.password}} </span>
                                </td>

                                <td data-field="Actions"
                                    class="m-datatable__cell m-datatable__cell--center m-datatable__cell m-datatable__cell--check">




                                    <router-link
                                            :to="{ name:'edit-dealer', params : { dealer : item}}">

                                        <a class="btn m-btn--pill m-btn--air         btn-outline-success">
                                            <i class="la la-edit"></i> Güncelle

                                        </a>
                                    </router-link>


                                    <a dataurl="41"
                                       class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                       v-on:click="deleteDealer(item.id)">
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


</template>

<script>

    import { mapGetters } from 'vuex'
    export default {


        data: function () {


            return {

                pType:this.$route.params.type

            }

        },
        methods: {


            deleteDealer(id) {

                this.$store.dispatch("deleteDealer", id);

            },
            isActiveSetter(dealer) {

                dealer.isActive = document.querySelector('#mycheckbox' + dealer.id).checked;

                this.$store.dispatch("dealerIsActiveSetter", dealer);
            }

        },

        created() {

                this.$store.dispatch("initDealers");


        },

        computed: {
            ...mapGetters([
                 'dealers'

            ]),



        },



    }

</script>

<style scoped>

</style>
