import Vue from "vue"
import VueRouter from "vue-router"

import CurrentList from "./view/Current/List"
import Currents from "./view/Current/Index"
import CreditCurrent from "./view/Current/Credit"

import Opinions from "./view/Opinion/Index"
import CreditOpinion from "./view/Opinion/Credit"


import Clients from "./view/Client/Index"
import CreditClient from "./view/Client/Credit"
import ClientCommon from "./view/Client/Common"

import Assays from "./view/Assay/Index"
import CreditAssay from "./view/Assay/Credit"

import UserProfile from "./view/Dealer/Profile"
import Users from "./view/Dealer/UserIndex"
import Dealers from "./view/Dealer/Index"
import CreditDealer from "./view/Dealer/Credit"
import CreditUser from "./view/Dealer/UserCredit"



import Calendar from "./view/Appointment/Calendar"
import AppointmentList from "./view/Appointment/List"
import Appointments from "./view/Appointment/Index"
import CreditAppointment from "./view/Appointment/Credit"


import SmokeForm from "./view/Forms/SmokForm"
import AlcoholForm from "./view/Forms/AlcoholForm"
import RezonansForm from "./view/Forms/RezonanForm"
import Report from "./view/Appointment/DateList"

import Home from "./view/Home"

Vue.use(VueRouter)



export const router = new VueRouter({
    routes : [

        { name:'calendar', path : "/admin", component : Calendar},
        { name:'calendar', path : "/", component : Calendar},
        { name:'calendar', path : "/home", component : Calendar},

        { name:'users', path : "/users", component : Users},
        { name:'add-user', path : "/user/create", component : CreditUser},
        { name:'edit-user', path : "/user/edit", component : CreditUser},


        { name:'profile', path : "/profile/:id", component : UserProfile},
        { name:'dealers', path : "/dealers", component : Dealers},
        { name:'add-dealer', path : "/dealer/create", component : CreditDealer},
        { name:'edit-dealer', path : "/dealer/edit", component : CreditDealer},

        { name:'calendar', path : "/calendar", component : Calendar},
        { name:'appointment-list', path : "/appointment-list", component : AppointmentList},
        { name:'appointments', path : "/appointments", component : Appointments},
        { name:'add-appointment', path : "/appointment/create/:clientId", component : CreditAppointment},
        { name:'edit-appointment', path : "/appointment/edit/:clientId/:id", component : CreditAppointment},
        { name:'appointment-name-list', path : "/appointment/name-list", component : () => import("./view/Appointment/NameSearch")},
        { name:'detail-appointment', path : "/appointment/detail", component : () => import("./view/Appointment/Detail")},
        { name:'add-client-appointment', path : "/appointment/create", component : () => import("./view/Appointment/ClientAppointment")},

        { name:'assays', path : "/assays", component : Assays},
        { name:'add-assay', path : "/assay/create/:clientId", component : CreditAssay},
        { name:'edit-assay', path : "/assay/edit", component : CreditAssay},


        { name:'clients', path : "/clients", component : Clients},
        { name:'add-client', path : "/client/create", component : CreditClient},
        { name:'edit-client', path : "/client/edit", component : CreditClient},
        { name:'client-common', path : "/client/info/:clientId", component : ClientCommon },


        { name:'opinions', path : "/opinions", component : Opinions},
        { name:'add-opinion', path : "/opinion/create/:clientId", component : CreditOpinion},
        { name:'edit-opinion', path : "/opinion/edit/:clientId", component : CreditOpinion},


        { name:'form-opinions', path : "/form-opinions", component : () => import('./view/OpinionForm/Credit')},
        { name:'form-add-opinion', path : "/form-opinion/create/:clientId",  component : () => import('./view/OpinionForm/Credit')},
        { name:'form-edit-opinion', path : "/form-opinion/edit/:clientId",   component : () => import('./view/OpinionForm/Credit')},


        { name:'current-list', path : "/current-list", component : CurrentList},
        { name:'currents', path : "/currents", component : Currents},
        { name:'add-current', path : "/current/create/:clientId", component : CreditCurrent},
        { name:'edit-current', path : "/current/edit/:clientId", component : CreditCurrent},



        { name:'smoke-form', path : "/form/smoke-form/:clientId", component : SmokeForm},
        { name:'alcohol-form', path : "/form/alcohol-form/:clientId", component : AlcoholForm},
        { name:'rezonans-form', path : "/form/rezonans-form/:clientId", component : RezonansForm},

        { name:'reports', path : "/appointment/report", component : Report},
    ],
    mode:'history'

})
