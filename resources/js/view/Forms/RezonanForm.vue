<template>
    <div class="m-content">
        <div class="col-md-12">

            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head " :class="{'alert-accent alert':form.id}">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text ">
                              Zayıflama  Form {{form.id ? 'Güncelle' :'Ekle'}}

                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">

                    </div>
                </div>
                <div class="m-portlet__body">
                 <form v-on:submit.prevent="onSubmit"
                                                class="m-form m-form--fit"
                                                method="post"
        >

            <div class="form-group m-form__group row ">
                <div class="col-md-6">

                    <div class="m-form__group form-group">
                        <label for="">
                            <b> 1) AŞAĞIDAKİ DÜŞKÜN OLDUĞUNUZ VEYA ÇOK KULLANDIĞINIZ GIDA GRUPLARINI İŞARETLEYİNİZ ?</b>
                        </label>
                        <div class="m-radio-inline" >
                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="1">
                                Hamur İşleri- Ekmek Makarna/Pilav
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="2">
                               Tatlılar (Şerbetli Yada Sütlü)
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="3">
                              Peynir, yoğurt yada süt
                                <span></span>
                            </label>

                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="4">
                              Çerezler
                                <span></span>
                            </label>

                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>2)AŞAĞIDAKİ İLAÇLARDAN KULLANMAKTA OLDUKLARINIZI İŞARETLEYİNİZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field2" :value="1">
                                İnsulin
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"  v-model="form.field2" :value="2">
                               İnsulin harici şeker ilaçları
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"    v-model="form.field2" :value="3">
                                Troid hormonu
                                <span></span>
                            </label>
                            <label class="">
                                <input type="hidden" class="form-control m-input"  placeholder="Lütfen Belirtin">
                                <span></span>
                            </label>
 <label class="m-radio">
                                <input type="radio"    v-model="form.field2" :value="3">
                                Östrojen içeren hormon ilaçları
                                <span></span>
                            </label>
                           <label class="m-radio">
                                <input type="radio"    v-model="form.field2" :value="3">
                                Kortizonlu ilaçları
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>3) KADINLAR İÇİN... ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field3" :value="1">
                                Menapoz döneminde değilim
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field3" :value="2">
                              Menapoz öncesi dönemdeyimi yada yeni başlıyor
                                <span></span>
                            </label>
                            <label class="m-radio">
                            <input type="radio"   v-model="form.field3" :value="3">
                              Manapoz dönemindeyim
                                <span></span>
                            </label>



                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>4) AŞAĞIDAKİ SİZDE OLANLARINI İŞARETLEYİNİZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field4" :value="1">
                                Kaızlık
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field4" :value="2">
                                Karında şişkinlik
                                <span></span>
                            </label>
   <label class="m-radio">
                                <input type="radio"   v-model="form.field4" :value="2">
                                Kolit tipi karın ağrıları
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>5) AŞAĞIDAKİ SİZDE OLANLARINI İŞARETLEYİNİZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="1">
Halsizlik Sabah Kalkmada Güçlük                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="2">
                             Sebebi   tam  olmayan vucut ağrıları
                                <span></span>
                            </label>
 <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="3">
                             Sıkıntılı duygusal durum
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="3">
                             Uyku Problemleri
                                <span></span>
                            </label>
                               <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="4">
                             Migren yada gerilim tipi baş ağrıları
                                <span></span>
                            </label>
                               <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="5">
                             Şeker düşmesi (hipoglisemi) atakları
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>6) SON İKİ YILDIR AĞZINIZDA AMALGAM DOLGU (SİYAH DOLGU) BULUNUYOR MU?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field6" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field6" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>7) HAMİLELİK İHTİMALİNİZ VAR MI ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field7" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field7" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>8) KALP PİLİ TAŞIYOR MUSUNUZ?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field8" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field8" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>
                                9) BİLİNEN BİR ALERJİNİZ VAR MI?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field9" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field9" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>


            </div>
                   <div class="m-form__group form-group">

                       <div class="m-radio-inline text-center">
                           <label class="m-checkbox">
                               <input type="checkbox"    v-model="checked" >
                               <a class="text-dark" data-toggle="modal" data-target="#m_modal_2">
                                   <b>Şartları</b>
                                   Okudum Kabul Ediyorum.  </a>
                               <span></span>
                           </label>
                       </div>
            </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">

                        <button type="submit" class="btn btn-primary" :disabled="!checked" >
                            Kaydet
                        </button>
                        <a v-on:click="$router.go(-1)" class="btn btn-secondary">
                            Vazgeç
                        </a>

                    </div>
                </div> <input type="hidden"    v-model="form.type=3" >
        </form>



                    <div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        Şartlar Ve Koşullar
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    Mental Relief (Ruhsal Rahatlama) terapiler hangi amaçla yapılırsa yapılsın detoks temelli olduğunu aklınızda bulundurmalısınız. Vücudunuzu temizlemek adına üzerinize düşen görevler bulunmaktadır. Seçtiğiniz programın devam ettiği süre boyunca öncelikle çok su içmenizi (normal içtiğinizin üzerine fazladan 1.5 litre),  seans yapılan günler sonrası özellikle 3-4 gün alkol almamanızı, vücudunuzu fiziksel açıdan çok zorlamamanızı ve dinlenmenizi, sık sık saunaya-hamama gitmenizi yada sıcak su dolu küvet içinde zaman geçirmenizi öneriyoruz.
                                    Seans sonrası yorgunluk hali, karın şişliği, kas ağrısı gibi durumlar vücudun kendini temizleyemediğini gösteren ve detoks problemi olarak adlandırılan bulgulardır. Böyle durumlarda detoks organlarını (özellikle safra kesesi, bağırsak ve cilt) desteklememiz gerekiyor, bu gibi problemler yaşarsanız bizi haberdar etmeniz gerekmektedir.
                                    Size sunduğumuz Mental Relief (Ruhsal Rahatlama) terapileri, dünyada yayılmakta olan bir holistik/integratif tıp tıp akımının yansımalarıdır. Mental Relief (Ruhsal Rahatlama)  cihazları ile yapılan terapilerin 35 yılı aşkın bir geçmişi vardır ve bu terapilerin herhangi bir yan etkisi olmadığı kesinlikle kanıtlanmıştır. Ancak Mental Relief  (Ruhsal Rahatlama) terapileri,  diet düzeninizi kolaylaştıran bir destel olarak alğılanmalıdır.

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Kapat
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import { mapGetters } from 'vuex'
    export default {


        data: function () {


            return {
    checked:false,
                accept:true,
                payload:{
                    type:3,
                    id:this.$route.params.clientId,
                },
                form:{
                    id:null,
                    field1:'',
                    field2:'',
                    field3:'',
                    field4:'',
                    field5:'',
                    field6:'',
                    field7:'',
                    field8:'',
                    field9:'',
                    field10:'',
                    field11:'',
                    field12:'',
                    field14:'',
                    field15:'',

                }

            }

        },
        methods: {


            onSubmit() {

                this.form.client_id=this.$route.params.clientId
                this.form.type=3
                if (!this.form.id) {

                    this.$store.dispatch("addForm", this.form).then(() => {

                        this.$router.push({name:'client-common', query:{formTab:1}, params:{clientId:this.$route.params.clientId}})


                    })


                } else {
                    this.$store.dispatch("updateForm", this.form).then(() => {

                        this.$router.push({name:'client-common', query:{formTab:1}, params:{clientId:this.$route.params.clientId}})
                    });

                }


            },

        },

        created() {

            this.$store.dispatch("initForm", this.payload);

            this.form={
                ...this.$store.getters.form}
        },

        computed:{
            ...mapGetters({
                forms:'form'
            }),


        },

        watch: {


            forms: function(val){


                if(val) {
                    this.form = val
                }

            }


        },



    }

</script>

<style scoped>

</style>
