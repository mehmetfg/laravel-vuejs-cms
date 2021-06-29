<template>


        <div class="m-content">

            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
                            <h3 class="m-portlet__head-text">
                             Randevu Detay
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->

                    <div class="m-portlet__body table table-hover" id="print">


                        <div class="form-group m-form__group row border-warning ">
                            <label class="col-lg-4 col-form-label m--icon-font-size-lg1">
                                Psikolog
                            </label>
                            <div class="col-lg-8">
                                <b> {{appointment.psychologist}}</b>
                            </div>
                        </div>
                            <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label m--icon-font-size-lg1">
                                Gelme Nedeni:
                            </label>
                            <div class="col-lg-6">
                                <b> {{appointment.reason}}</b>
                            </div>
                            </div>
                            <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label m--icon-font-size-lg1">
                                Cihaz:
                            </label>
                            <div class="col-lg-3">
                                <b> {{appointment.device}}</b>
                            </div>
                            </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label m--icon-font-size-lg1">
                                Başlangıç Tarihi:
                            </label>
                            <div class="col-lg-3">

                                <b> {{appointment.start_date | formatShift}}</b>

                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label m--icon-font-size-lg1">
                                Bitiş Tarihi:
                            </label>
                            <div class="col-lg-3">

                                <b> {{appointment.finish_date | formatShift}}</b>

                            </div>
                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label m--icon-font-size-lg1">
                                Açıklama
                            </label>
                            <div class="col-lg-3">
                                        <b> {{appointment.description}}</b>
                            </div>

                        </div>

                        <div class="form-group m-form__group row">
                            <label class="col-lg-4 col-form-label m--icon-font-size-lg1">
                                Durum:
                            </label>

                            <div class="col-lg-3">
                              <b>  {{$store.getters.appointStatus[appointment.status]}}</b>
                            </div>
                        </div>

                        <!--end::Form-->
                    </div> <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-7">
                                <button type="submit" class="btn btn-brand" v-on:click="print" >
                                    <i class="la la-print"></i> Yazdır
                                </button>
                                <a v-on:click="$router.go(-1)" class="btn btn-secondary">
                                    Vazgeç
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</template>

<script>
    export default {
        name: "Detail",
        data(){

            return {

                appointment:'',
            }
        },

        methods:{

            print(){

                this.$htmlToPaper('print')
            }
        },
        created(){

            this.appointment = {
                ...this.$route.params.appointment

            }
        }
    }
</script>

<style scoped>

</style>