<template>

    <div class="m-portlet m-portlet--tab">

        <div class="m-portlet__head " :class="">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Danışanlar

                    </h3>

                </div>
            </div>
            <div class="m-portlet__head-tools">
                <router-link :to="{name:'add-client'}" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                    <a >
												<span>
																<i class="fa fa-plus "></i>
													<span>
														Yeni Danışan Ekle
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
                                 Adı
                                </th>

                                <th>
                                    EMail
                                </th>
                                <th>
                                    Telefon
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
                                    <input type="text" v-model="searchEmail" class="form-control" placeholder="Email Aramak için yazınız"/>
                                </th>
                                <th>
                                    <input type="text" v-model="searchPhone" class="form-control" placeholder="Telefon Aramak için yazınız"/>
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody is="transition-group" name="list" mode="out-in" type="transition" appear>

                            <tr v-for="(item, index) in clients" :class="" :key="item.id" :style="{transitionDelay: (index * 0.1) + 's'}">
                                <td>
                                    <span    >{{item.id}} </span>

                                </td>

                                <td>

                                   <span class="bold "    >{{item.name}} </span>
                                </td>
                                <td width="250px">

                                    <span class="bold "    >{{item.email}} </span>


                                </td>
                                <td>            <span class="bold "    >{{item.phone}} </span></td>

                                <td data-field="Actions"
                                    class="m-datatable__cell m-datatable__cell--center m-datatable__cell m-datatable__cell--check">

                                    <router-link
                                            :to="{ name:'add-appointment', params : { clientId : item.id}}">

                                        <a class="btn m-btn--pill m-btn--air         btn-outline-warning">
                                            <i class="la la-calendar"></i> Randevu Ekle

                                        </a>
                                    </router-link>


                                    <router-link
                                            :to="{ name:'client-common', query:{appointTab:1}, params : { clientId : item.id}}">

                                        <a class="btn m-btn--pill m-btn--air  text-white          btn-danger">
                                            <i class="fa fa-cubes"></i>       Danışan İşlemleri

                                        </a>
                                    </router-link>


                                    <router-link
                                            :to="{ name:'edit-client', params : { client : item}}">

                                        <a class="btn m-btn--pill m-btn--air         btn-outline-success">
                                            <i class="la la-edit"></i> Güncelle

                                        </a>
                                    </router-link>


                                    <a dataurl="41"
                                       class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air"
                                       v-on:click="deleteClient(item.id)">
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



    export default {

        components:{


        },

        data: function () {


            return {

                searchName:'',
                searchEmail:'',
                searchPhone:'',

            }

        },
        methods: {


            deleteClient(id) {

                this.$store.dispatch("deleteClient", id);

            },


        },

        created() {

        if(this.$route.query.q) {
            swal({
                position: 'center',
                type: 'warning',
                title: 'Uyarı !',
                text: 'Randevu Eklemeden Önce Danışan seçmelisiniz',
                showConfirmButton: true,

            })
        }
                this.$store.dispatch("initClients");


        },

        computed: {
            clients(){


                return  this.$store.getters.clients.filter(post=> {

                    return (post.name?post.name.toLowerCase().includes(this.searchName.toLowerCase()):'')
                    &&  (post.email?post.email.toLowerCase().includes(this.searchEmail.toLowerCase()):'')
                    && (post.phone?post.phone.toLowerCase().includes(this.searchPhone.toLowerCase()):'')

                })
            }


        },



    }

</script>

<style scoped>

</style>
