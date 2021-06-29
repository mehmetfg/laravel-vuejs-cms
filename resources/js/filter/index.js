import moment from "moment";
import Vue from 'vue'
Vue.filter('formatShift', function(value) {
    if (value) {
        return moment(String(value)).format('DD.MM.YYYY')
    }
})
Vue.filter('getMatch', function(value) {
    if (value) {
        return
    }
})
Vue.filter('formatCurrency', function (value) {
        return  new Intl.NumberFormat('tr-TR', {
            style: 'currency',
            currency: 'TRY',
        }).format(value);
});