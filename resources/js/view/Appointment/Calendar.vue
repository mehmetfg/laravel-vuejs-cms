<template>

        <div class="m-portlet m-portlet--tabs" >

            <div class="m-portlet__head " :class="">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Randevular

                        </h3>

                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <form v-on:submit.prevent="onDate()">
                    <div class="row">
                        <div class="col-md-6">

                   <input placeholder="Adı Soyadı" v-model="name" class="form-control">
                        </div>

                        <div class="col-md-3">

                           <button  class="btn btn-primary btn-block">Ara</button>
                        </div>

                        <div class="col-md-3">
                            <button type="button" v-on:click="print" class="btn btn-primary" >
                                <i class="la la-print"></i> Yazdır
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


                <div class="tab-content" >


                    <div class="m-portlet__body">

            <div class='demo-app'>
                <div class='demo-app-top'>

                </div>

                <FullCalendar id="printMe"
                        eventBorderHeight="0px"
                        eventContentHeight="1.65rem"

                        :locale="trLocale"
                        :theme-system="themeSystem"
                        min-time="07:00:00"

                        event-text-color="white"
                        ref="fullCalendar"
                        defaultView="timeGridDay"

                        :header="{

        left: 'prev,next today',

        center: 'title',
        right: 'year, dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      }"
                        :plugins="calendarPlugins"
                        :weekends="calendarWeekends"
                        :events="calendarEvents"
                        :views="views"

                              @dateClick="handleDateClick"

                />
            </div>
        </div>

    </div>

            </div>


    </template>

<script>
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'
    import timeGridPlugin from '@fullcalendar/timegrid'

    import googleCalendarPlugin  from '@fullcalendar/google-calendar'
    import trLocale from '@fullcalendar/core/locales/tr';
    import bootstrapPlugin from '@fullcalendar/bootstrap';
    import interactionPlugin from '@fullcalendar/interaction'
    export default {
        components: {
            FullCalendar, // make the <FullCalendar> tag available

        },
        data: function() {
            return {
                name:'',


                trLocale:trLocale,
                calendarPlugins: [ // plugins must be defined in the JS
                    dayGridPlugin,
                    timeGridPlugin,
                    //interactionPlugin, tıklama eylemi için gerekli

                    bootstrapPlugin
                    // needed for dateClick
                ],
                views: {

                    timelineCustom: {
                        type: 'timeline',
                        buttonText: 'Year',
                        dateIncrement: {years: 1},
                        slotDuration: {months: 1},
                        visibleRange: function (currentDate) {
                            return {
                                start: currentDate.clone().startOf('year'),
                                end: currentDate.clone().endOf("year")
                            };
                        }
                    }
                },
                themeSystem: 'bootstrap',
                googleCalendarApiKey: 'AIzaSyCy1gZVQYmMnLDyIbsD3wrZ1Kktf4yPUvk',

                calendarWeekends: true,


            }
        },
        methods: {
            print(){

                this.$htmlToPaper('printMe')
            },
            onDate:function(){

                this.$router.push({name:"appointment-name-list",query:{name:this.name}})
            },
            toggleWeekends() {
                this.calendarWeekends = !this.calendarWeekends // update a property
            },
            gotoPast() {

            },

            handleDateClick(arg) {


                if (confirm('Would you like to add an event to ' + arg.date + ' ?')) {
                    this.calendarEvents.push({ // add new event data
                        title: 'Yeni Olay',
                        start: arg.date,
                        allDay: false
                    })
                }
            }
        },

        created(){

            this.$store.dispatch("initCalendarData")




        },
        beforeCreate(){



        },
        computed:{

            calendarEvents(){

                return this.$store.getters.calendarData
            }
        }

    }
</script>

<style lang='scss'>
    // you must include each plugins' css
    // paths prefixed with ~ signify node_modules
    @import '../../../../node_modules/@fullcalendar/core/main.css';
    @import '../../../../node_modules/@fullcalendar/daygrid/main.css';
    @import '../../../../node_modules/@fullcalendar/timegrid/main.css';
</style>