<template>




                <!--begin::Form-->
    <div class="tab-pane  "  :class="{'active':formTab}" id="formlar" role="tabpanel">

        <div class="m-portlet m-portlet--tab">

            <div class="m-portlet__head " :class="">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Formlar

                        </h3>

                    </div>
                </div>
                <div class="m-portlet__head-tools">


                </div>
            </div>
        <div class="form-group m-form__group">
            <div class="row">
                <div class="col-lg-4">

                    <router-link :to="{name:'smoke-form', params:{clientId:$route.params.clientId}}">
                        <a class="btn btn-lg text-white btn-block " :class="[formControll(1)?'btn-primary':'btn-danger']"
                                                                                                         style="text-decoration: none !important">
                        <i class="la la-check" v-show="formControll(1)"></i>   Sigara Bırakma Formu</a>

                    </router-link>
                </div>


                <div class="col-lg-4">
                    <router-link :to="{name:'alcohol-form', params:{clientId:$route.params.clientId}}">
                        <a class="btn btn-lg text-white btn-block " :class="[formControll(2)?'btn-primary':'btn-danger']" style="text-decoration: none">
                    <i class="la la-check" v-show="formControll(2)"></i> Alkol Bırakma Formu</a>

                    </router-link>
                </div>
                <div class="col-lg-4">
                    <router-link :to="{name:'rezonans-form', params:{clientId:$route.params.clientId}}">
                        <a class="btn btn-lg text-white btn-block " :class="[formControll(2)?'btn-primary':'btn-danger']" style="text-decoration: none">
                        <i class="la la-check" v-show="formControll(3)"></i> Zayıflama Formu</a>

                    </router-link>
                </div>


            </div>
        </div>
    </div>


</div>


</template>

<script>


    export default {

    props:['formTab'],

        data: function () {


            return {
                smoke:false,
                alcohol:false,
                rezonan:false,
                dealer: {},

            }
        },
        methods: {

            onSubmit() {

                if (!this.dealer.id) {
                    this.$store.dispatch("addDealer", this.dealer).then(() => {

                        this.$router.go(-1)


                    })


                } else {
                    this.$store.dispatch("updateDealer", this.dealer).then(() => {

                        this.$router.go(-1)
                    });

                }


            },
            onSwitch(deger){

                if(deger=='1'){
                    this.smoke=true
                    this.alcohol=false
                    this.rezonan=false
                }else if(deger=='2'){
                    this.smoke=false
                    this.alcohol=true
                    this.rezonan=false

                }else if(deger=='3'){

                    this.smoke=false
                    this.alcohol=false
                    this.rezonan=true

                }

            },
            formControll(value){
                return this.forms.find(deger=>{

                   return deger.type==value
                })
            }


        },


        created() {
            this.dealer = {
                ...this.$route.params.clientId

            }




          console.log(this.forms)


        },


        computed:{

        forms(){

            return this.$store.getters.forms;
        }
        },
        watch:{



        }


    }
</script>

