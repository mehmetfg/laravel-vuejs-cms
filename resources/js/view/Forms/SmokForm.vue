<template>
    <div class="m-content">
        <div class="col-md-12">

            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head " :class="{'alert-accent alert':form.id}">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text ">
                            Sigara Bırakma    Form {{form.id ? 'Güncelle' :'Ekle'}}

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
                            <b> 1) SON 4 - 5 YILDIR GÜNDE KAÇ SİGARA KULLANIYORSUNUZ ?</b>
                        </label>
                        <div class="m-radio-inline" >
                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="1">
                                10 taneden az
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="2">
                                11-20 tane
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="3">
                                21-30 tane
                                <span></span>
                            </label>

                            <label class="m-radio">
                                <input type="radio"  name="field1" v-model="form.field1" :value="4">
                                31 ve Üzeri
                                <span></span>
                            </label>

                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>2)KAÇ YILDIR SİGARA KULLANIYORSUNUZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field2" :value="1">
                                10 yıldan az
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"  v-model="form.field2" :value="2">
                                10-20 yıl
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"    v-model="form.field2" :value="3">
                                20 yıl üzeri
                                <span></span>
                            </label>
                            <label class="">
                                <input type="hidden" class="form-control m-input"  placeholder="Lütfen Belirtin">
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>3) İLK SİGARANIZI SABAH KALKTIKTAN NE KADAR SONRA İÇERSİNİZ ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field3" :value="1">
                                ilk 5 dk içinde
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field3" :value="2">
                                6-30 dk içinde
                                <span></span>
                            </label>
                            <label class="m-radio">
                            <input type="radio"   v-model="form.field3" :value="3">
                                31-60 dk içinde
                                <span></span>
                            </label>

                            <label class="m-radio">
                                <input type="radio"   v-model="form.field3" :value="4">
                                1 saatten sonra
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>4) SİGARA İÇME YASAĞI OLAN YERLERDE ZORLANIYORMUSUNUZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field4" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field4" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>5) VAZGEÇMESİ EN ZOR SİGARA HANGİSİ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="1">
                                Sabah ilk sigara
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field5" :value="2">
                                Fark etmez
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>6) GÜNÜN İLK SAATLERINDE DAHA SONRAKI SAATLERE GÖRE DAHA SIK MI IÇIYORSUNUZ ?</b>
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
                            <b>7) GÜNÜN BÜYÜK BİR BÖLÜMÜNÜ YATAKTA GEÇIRECEK KADAR HASTA OLSANIZ YINE DE IÇER MİSİNİZ?</b>
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
                            <b>8) HAMİLELİK İHTİMALİNİZ VARMI?
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
                            <b>9) ANTİ-DEPRESAN KULLANIYOR MUSUNUZ?
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
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>
                                10) KALP PİLİ TAŞIYOR MUSUNUZ?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field10" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field10" :value="2">
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
                                11) KAN SULANDIRICI İLAÇ KULLANIYOR MUSUNUZ?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field11" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field11" :value="2">
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
                                12) BİLİNEN BİR ALERJİNİZ VARMI?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field12" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                                <input type="radio"   v-model="form.field12" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group m-form__group" v-show="false">
                        <label for="exampleTextarea">
                            Eklemek İstedikleriniz
                        </label>
                        <textarea hidde class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
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
                </div>
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
                            Mental relief (Ruhsal Rahatlama) terapileri yan etkisi bulunmayan ve birçok hastalıkta kullanılabilen bir tamamlayıcı yöntemdir. Seansların amacı kullanılan enerji yardımıyla hücresel bazda bir "detoks-temizlenme” işlemini başlatmaktır. Sigaranın içerdiği toksik maddelere ve nikotine karşı "hücresel hafızayı” resetlemek olarak da tanımlanabilir. Terapinin etkisi genellikle hemen o anda başlasa da, sigara isteğindeki azalmanın net olarak hissedilebilir olması için en az bir gece/7-8 saatlik bir uyku periyodunun geçmesi gerekmektedir.
                            Bu programa başlayan kişilerin ilk günler içinde ikinci bir seans hakları olduğunu ve bunun için herhangi bir ücret talep edilmeyeceğini unutmayınız. Bunun dışında, birazdan görüşeceğiniz uzmanınız, sizin için ekstra seanslar da önerebilir ve bu durumda ilk iki seans dışındaki devam seansları için ücret talep edilecektir.
                            Yapılan tedavinin yarattığı detoks-temizlenme faaliyetinde üzerinize düşen görevler bulunmaktadır. Seans sonrası uymanız gereken kurallarla ilgili olarak biraz sonra yapılacak görüşme dışında size vereceğimiz yazılı bir form yardımıyla da bilgilendirileceksiniz. Temizlenmenin yeterince olabilmesi için, bahsedeceğimiz kurallara harfiyen uyulmasını bekliyoruz.
                            Size sunduğumuz mental relief (Ruhsal Rahatlama) terapileri, dünyada yayılmakta olan bir holistik/integratif (tamamlayıcı/bütünsel) tıp akımının yansımalarıdır. Mental relief  (Ruhsal Rahatlama) cihazları ile yapılan terapilerin, 35 yılı aşkın bir geçmişi vardır ve bu terapilerin herhangi bir yan etkisinin olmadığı kesin olarak kanıtlanmıştır. Ancak mental relief terapileri, "tıbbi bir tedavi” değildir, herhangi bir tıbbi tedaviye "alternatif" de değildir. Mental relief terapileri, sigarayı bırakma sürecinizi kolaylaştıran bir destek olarak algılanmalıdır. Uygulamanın etkinliğinin izlenebilmesi ve gerekli hallerde yardım edebilmemiz açısından 2. gün, 1, 2 ve 4 hafta sonrasında telefonla aranacaksınız. Aranmak istemiyorsanız bize bildirmenizi rica ediyoruz.
                            Son bir not olarak: Sigarayı bırakamamanız durumunda ücret iadesi söz konusu değildir. Yukarıda yazılanları okuduğunuzu ve kabul ettiğinizi belirtmek üzere lütfen kutucuğa tıklayınız.

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
                payload:{
                    type:1,
                    id:this.$route.params.clientId,
                },
                form:{


                }

            }

        },
        methods: {


            onSubmit() {

                this.form.client_id=this.$route.params.clientId
                this.form.type=1
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
