<template>
    <div class="m-content">

        <!--begin::Portlet-->
        <div class="m-portlet m-portlet--tab">
            <div class="m-portlet__head":class="{'alert-accent alert':current.id}">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                        <h3 class="m-portlet__head-text">
                            Cari {{current.id ? 'Güncelle' :'Ekle'}}
                        </h3>
                    </div>
                </div>
            </div>
            <!--begin::Form-->    <div class="m-portlet__body">
            <form class="m-form m-form--fit m-form--label-align-right" v-on:submit.prevent="onSubmit">

                    <input type="hidden" v-model="current.client_id=$route.params.clientId">
                    <div class="form-group m-form__group">
                        <label >
                            Cari Hareket  Cinsi
                        </label>
                        <select v-model="current.type" class="form-control" >
                            <option :value="1">Borç</option>
                            <option :value="2">Tahsilat</option>
                        </select>
                    </div>
                <div class="form-group m-form__group">
                    <label >
                        Cari Hareket  Türü
                    </label>
                    <select v-model="current.kind" class="form-control">
                        <option value="1" v-show="current.type=='2'">Nakit</option>
                        <option value="2" v-show="current.type=='2'">Kredi Kartı</option>
                        <option value="3"   v-show="current.type=='1'">Muayene</option>
                        <option value="4"   v-show="current.type=='1'">Cihaz Seans</option>
                        <option value="5"   v-show="current.type=='1'">Ürün</option>

                    </select>
                </div>
                <div class="form-group m-form__group">
                    <label for="">Tanım:</label>
                    <input type="text" class="form-control"  placeholder="Örn. Ürün Adı" v-model="current.definition">
                    <div class="d-md-none m--margin-bottom-10"></div>
                </div>
                <div class="form-group m-form__group">
                    <label for="">Tarih:</label>
                    <VueCtkDateTimePicker  button-now-translation="Şimdi" label="Tarih " :only-date="true" formatted="DD.MM.YYYY" v-model="current.date"></VueCtkDateTimePicker>

                    <div class="d-md-none m--margin-bottom-10"></div>
                </div>
                <div class="form-group m-form__group">
                    <label for="">Tutar:</label>
                    <input type="text" class="form-control"  placeholder="Tutar" v-model="current.total">
                    <div class="d-md-none m--margin-bottom-10"></div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">
                            Kaydet
                        </button>
                        <a v-on:click=" $router.push({name:'client-common', query:{curTab:1}, params:{clientId:$route.params.clientId}})" class="btn btn-secondary">
                            Vazgeç
                        </a>
                    </div>
                </div>
            </form>

            <!--end::Form-->
        </div>
        <!--end::Portlet-->
    </div>
        <!--end::Portlet-->
    </div>


</template>

<script>

    import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
    import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';
    export default {

components:{
    VueCtkDateTimePicker

},
        data: function () {


            return {

                current: {},

            }
        },
        methods: {

            onSubmit() {

                if (!this.current.id) {
                    this.$store.dispatch("addCurrent", this.current).then(() => {

                        this.$router.push({name:'client-common', query:{curTab:1}, params:{clientId:this.$route.params.clientId}})


                    })


                } else {
                    this.$store.dispatch("updateCurrent", this.current).then(() => {
                        this.$router.push({name:'client-common', query:{curTab:1}, params:{clientId:this.$route.params.clientId}})
                    });

                }


            },


        },


        created() {
            this.current = {
                ...this.$route.params.current

            }





        },



        watch:{



        }


    }
</script>

