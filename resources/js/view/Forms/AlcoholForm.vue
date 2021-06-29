<template>
    <div class="m-content">
        <div class="col-md-12">

            <div class="m-portlet m-portlet--tab">
                <div class="m-portlet__head " :class="{'alert-accent alert':form.id}">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text ">
                              Alkol Bırakma  Form {{form.id ? 'Güncelle' :'Ekle'}}

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
                <input type="hidden"    v-model="form.type=2" >
            <div class="form-group m-form__group row ">
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b> 1) SON 4-5 YILDIR GÜNDE KAÇ KADEH ALKOL KULLANIYORSUNUZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field1" :value="1">
                                1 kadeh
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field1" :value="2">
                                2 kadeh
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field1" :value="3">
                                5 kadeh
                                <span></span>
                            </label>

                            <label class="m-radio">
                               <input type="radio"    v-model="form.field1" :value="4">
                                Diğer
                                <span></span>
                            </label>
                            <label class="">
                                <input type="text" class="form-control m-input"  v-show="false" placeholder="Lütfen Belirtin">
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>2) İLK ALKOLÜNÜZÜ SAAT KAÇTAN SONRA İÇERSİNİZ? </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field2" :value="1">
                                Sabah
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field2" :value="2">
                                Öğle
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field2" :value="3">
                                Öğleden sonra
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field2" :value="4">
                                Akşam
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>3) ALKOL İÇME YASAĞI OLAN YERLERDE ZORLANIYORMUSUNUZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field3" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field3" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>4) VAZGEÇMESİ EN ZOR ALKOL HANGİSİ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field4" :value="1">
                                Rakı
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field4" :value="2">
                                Şarap
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field4" :value="3">
                                Bira
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field4" :value="4">
                                Viski
                                <span></span>
                            </label>

                            <label class="m-radio">
                               <input type="radio"    v-model="form.field4" :value="5">
                                Diğer
                                <span></span>
                            </label>
                            <label class="">
                                <input type="text" class="form-control m-input" v-show="false" placeholder="Lütfen Belirtin">
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>5) KAÇ YILDIR ALKOL KULLANIYORSUNUZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field5" :value="1">
                                1-3 yıl
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field5" :value="2">
                                3-5 yıl
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field5" :value="3">
                                5-10 yıl
                                <span></span>
                            </label>

                            <label class="m-radio">
                               <input type="radio"    v-model="form.field5" :value="4">
                                Diğer
                                <span></span>
                            </label>
                            <label class="">
                                <input type="text" class="form-control m-input" v-show="false" placeholder="Lütfen Belirtin">
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>6) GÜNÜN BÜYÜK BİR BÖLÜMÜNÜ YATAKTA GEÇİRECEK KADAR HASTA OLSANIZ YİNE DE ALKOL ALIRMISINIZ?</b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field6" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field6" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>7) HAMİLELİK İHTİMALİNİZ VARMI?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field7" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field7" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-form__group form-group">
                        <label for="">
                            <b>8) ANTİ-DEPRESAN KULLANIYOR MUSUNUZ?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field8" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field8" :value="2">
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
                                9) KALP PİLİ TAŞIYOR MUSUNUZ?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field9" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field9" :value="2">
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
                                10) KAN SULANDIRICI İLAÇ KULLANIYOR MUSUNUZ?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field10" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field10" :value="2">
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
                                11) BİLİNEN BİR ALERJİNİZ VARMI?
                            </b>
                        </label>
                        <div class="m-radio-inline">
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field11" :value="1">
                                Evet
                                <span></span>
                            </label>
                            <label class="m-radio">
                               <input type="radio"    v-model="form.field11" :value="2">
                                Hayır
                                <span></span>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <div class="form-group m-form__group">
                        <label for="exampleTextarea">
                            Eklemek İstedikleriniz
                        </label>
                        <textarea class="form-control m-input" id="exampleTextarea"   v-model="form.field12"  rows="3"></textarea>
                    </div>

                </div>
            </div>
            <div class="m-form__group form-group">

                <div class="m-radio-inline text-center">
                    <label class="m-checkbox">
                       <input type="checkbox"    v-model="checked" >
                        <a class="text-dark" data-toggle="modal" data-target="#m_modal_2">
                            <b>Şartları</b>
                       Okudum Kabul Ediyorum. </a>
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
                            <p>
                                Rezonans terapileri yan etkisi bulunmayan ve birçok hastalıkta kullanılabilen bir tamamlayıcı tıp yöntemidir. Seansların amacı kullanılan
                                elektromanyetik titreşimler yardımıyla hücresel bazda bir’ detoks-temizlenme ‘ işlemini başlatmaktır. Alkolün içerdiği toksik maddelere ve alkole
                                karşı ‘hücresel hafızayı‘ resetlemek olarak da tanımlanabilir. Terapinin etkisini genellikle hemen o anda başlasa da, alkol isteğindeki azalmanın net
                                olarak hissedilebilir olması için en az bir gece /7-8 saatlik bir uyku periyodunun geçmesi gerekmektedir.
                            </p>
                            <p>
                                Bu programa başlayan kişilerin ilk 3 ay içinde ek bir seans hakları olduğunu ve bunun için herhangi bir ücret talep edilmeyeceğini unutmayınız.
                                Bunun dışında, birazdan görüşeceğiniz terapistiniz, sizin için ekstra seanslar da önerebilir.
                                Yapılan tedavinin yarattığı detoks-temizlenme faaliyetinde üzerinize düşen görevler bulunmaktadır. Seans sonrası uymanız gereken kurallarla
                                ilgiliolarak biraz sonra yapılacak görüşme dışında size vereceğimiz yazılı bir form yardımıyla da bilgilendirileceksiniz. Temizlenmenin yeterince
                                olabilmesi için, bahsedeceğimiz kurallara harfiyen uyulmasını bekliyoruz.
                            </p>
                            <p>
                                Size sunduğumuz rezonans terapiler, dünyada yayılmakta olan bir holistik/integratif ( tamamlayıcı/bütünsel) tıp akımının yansımalarıdır.
                                Biorezonans cihazları ile yapılan terapilerin ,35 yılı aşkın bir geçmişi vardır ve bu terapilerin her hangi bir yan etkisinin olmadığı kesin olarak
                                kanıtlanmıştır. Ancak rezonans terapilerin , ‘tıbbi bir tedavi’ değildir, herhangi bir tıbbi tedaviye ‘ alternatif’ de değildir. Rezonans terapileri
                                alkolü bırakma sürecinizi kolaylaştıran bir destek olarak algılanmalıdır. Son bir not olarak: Alkolü bırakamamanız durumunda ücret iadesi söz
                                konusu değildir. Yukarıda yazılanları okuduğunuzu ve kabul ettiğinizi belirlemek üzere lütfen kutucuğa tıklayın.
                            </p>
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
                    type:2,
                    id:this.$route.params.clientId,
                },
                form:{
                  }

            }

        },
        methods: {


            onSubmit() {

                this.form.client_id=this.$route.params.clientId
                this.form.type=2
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
