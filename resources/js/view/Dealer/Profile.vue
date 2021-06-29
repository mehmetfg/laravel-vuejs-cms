<template>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="m-portlet m-portlet--full-height  ">
                    <div class="m-portlet__body">
                        <div class="m-card-profile">
                            <div class="m-card-profile__title m--hide">
                                Profil
                            </div>
                            <div class="m-card-profile__pic">
                                <div class="m-card-profile__pic-wrapper">
                                    <img src="/upload/logo/Db6R4xN2pPmQ871zBPEKcuTLIDo2l4CUu6E0PQhD.jpeg" alt="">
                                </div>
                            </div>
                            <div class="m-card-profile__details">
												<span class="m-card-profile__name">
													{{dealer.name}}
												</span>
                                <a href="" class="m-card-profile__email m-link">
                                    {{dealer.email}}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">

                    <div class="tab-content">
                        <div class="tab-pane active show" id="m_user_profile_tab_1">
                            <form v-on:submit.prevent="onSubmit" class="m-form m-form--fit m-form--label-align-right">


                                <div class="m-portlet__body">
                                    <div class="form-group m-form__group m--margin-top-10 m--hide">
                                        <div class="alert m-alert m-alert--default" role="alert">
                                            The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                             Kullanıcı Detay
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Adı
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="name" v-model="dealer.name">
                                        </div>
                                    </div>

                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            E-Mail
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="email" v-model="dealer.email">

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Parola
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="password" >
                                            <span class="m-form__help">
																Parolanızı Güncellemek istiyorsanız doldurunuz. Değişiklik istemiyorsanız boş bırakınız.
															</span>
                                        </div>
                                    </div>

                                    <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">
                                                Bilgiler
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Telefon
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="email" v-model="dealer.phone">

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="example-text-input" class="col-2 col-form-label">
                                            Adres
                                        </label>
                                        <div class="col-7">
                                            <input class="form-control m-input" type="text" name="address" v-model="dealer.address">
                                        </div>
                                    </div>


                                </div>
                                <div class="m-portlet__foot m-portlet__foot--fit">
                                    <div class="m-form__actions">
                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="col-7">
                                                <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Kaydet
                                                </button>
                                                &nbsp;&nbsp;
                                                <a href="javascript:window.location.back" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                    Vazgeç
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="m_user_profile_tab_2"></div>
                        <div class="tab-pane" id="m_user_profile_tab_3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {


            return {



            }
        },
        methods: {

            onSubmit() {


                    this.$store.dispatch("updateDealer", this.dealer).then(() => {

                        this.$router.go(-1)
                    });




            },


        },


        created() {
             this.$store.dispatch("initDealer", this.$route.params.id)







        },
        computed:{
            dealer(){

                return this.$store.getters.dealer
            }

        }






    }
</script>

<style scoped>

</style>