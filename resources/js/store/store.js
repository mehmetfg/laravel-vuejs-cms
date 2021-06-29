import Vuex from 'vuex';
import Vue from "vue";
import appointment from "./modules/appointment";
import dealer from "./modules/dealer";
import assay from "./modules/assay";
import client from "./modules/client";
import opinion from "./modules/opinion";
import current from "./modules/current";
import form from "./modules/form";
import common from "./common";


Vue.use(Vuex);
export const store = new Vuex.Store({
    state:{

    },
    modules:{
        assay,
        appointment,
        dealer,
        client,
        opinion,
        current,
        form,
        common
    }

})