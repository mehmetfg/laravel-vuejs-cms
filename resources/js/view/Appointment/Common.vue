<template>
    <div class="m-content">
        <div class="m-portlet m-portlet--tabs">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">

                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs-line m-tabs-line--right" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link " data-toggle="tab" href="#calendar" role="tab">
                                <i class="fa fa-user"></i>
                           Takvim
                            </a>
                        </li>
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#list" role="tab">
                                <i class="flaticon-list-2"></i>
                                Randevular
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

                <div class="tab-content">


                 <div class="m-portlet__body">
                     <div class="tab-pane " id="calendar" role="tabpanel">
<calendar></calendar>
                     </div>
                 </div>
                    </div>
            <div class="tab-pane active" id="list" role="tabpanel">
<appointment></appointment>

            </div>



                </div>
                <hr>



        <!--end::Portlet-->
    </div>



</template>

<script>

import  appointment from "./List"
import calendar from "./Calendar"

    export default {

        components:{

            calendar,
            appointment,

        },
        data: function () {


            return {



            }
        },
        methods: {




        },


        created() {








        },



     computed:{


     }


    }
</script>

