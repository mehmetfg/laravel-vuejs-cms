<template>
    <div class="m-content">
        <div class="m-portlet m-portlet--tabs">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Danışanlar
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs-line m-tabs-line--right" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#information" role="tab">
                                <i class="fa fa-user"></i>
                                Kişisel Bilgiler
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <form v-on:submit.prevent="onSubmit">
                <div class="tab-content">
                    <div class="tab-pane active" id="information" role="tabpanel">

                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label>
                                        Ad Soyad:
                                    </label>
                                    <input type="text"  class="form-control m-input--air m-input" required="required"  placeholder="Ad Soyad:" v-model="client.name">

                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        Email:
                                    </label>
                                    <input type="email"  class="form-control m-input--air m-input" placeholder="Mail Adresinizi Yazın." v-model="client.email">

                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        Telefon
                                    </label>
                                    <input type="text"  class="form-control m-input--air m-input"  placeholder="Telefon Numaranızı Yazın."v-model="client.phone">

                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-lg-4">
                                    <label class="">
                                        İş veya Ev Telefonu:
                                    </label>
                                    <input   class="form-control m-input--air m-input" placeholder="İş Veya Ev Telefonunuzu  Yazın." v-model="client.home_phone">

                                </div>
                                <div class="col-lg-4">
                                    <label>
                                        İl:
                                    </label>
                                  <select v-model="client.city"  class="form-control m-input--air">
                                      <option v-for="(item, index) in cities" :value="item">{{item}}</option>
                                  </select>

                                </div>
                                <div class="col-lg-4">
                                    <label class="">
                                        Meslek:
                                    </label>
                                    <input   class="form-control m-input--air m-input" placeholder="Mesleğiniz" v-model="client.job">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">

                                <div class="col-lg-4">
                                    <label>
                                        Yaş:
                                    </label>
                                    <input type="text"  class="form-control m-input--air m-input" placeholder="Yaşınız" v-model="client.age">

                                </div>
                                <div class="col-lg-4">
                                    <label>
                                        Bize Nasıl Ulaştınız:
                                    </label>
                                    <input type="text"  class="form-control m-input--air m-input" placeholder="Bize Nasıl Ulaştınız." v-model="client.contact">

                                </div>
                            </div>

                    </div>





                </div>
                <hr>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit text-center ">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">


                            <button type="submit" class="btn btn-primary">
                                Kaydet
                            </button>
                            <a v-on:click="$router.go(-1)" class="btn btn-secondary">
                                Vazgeç
                            </a>

                        </div>
                    </div>
                </div>
                </form>
            </div>

        <!--end::Portlet-->
    </div>

    </div>

</template>

<script>


    export default {


        data: function () {


            return {

                client: {},


            }
        },
        methods: {

            onSubmit() {

                if (!this.client.id) {
                    this.$store.dispatch("addClient", this.client).then(() => {

                        this.$router.go(-1)


                    })


                } else {
                    this.$store.dispatch("updateClient", this.client).then(() => {

                        this.$router.go(-1)
                    });

                }


            },


        },


        created() {
            this.client = {
                ...this.$route.params.client

            }






        },


        computed:{

            cities(){

                return this.$store.getters.cities
            }
        }


    }
</script>

