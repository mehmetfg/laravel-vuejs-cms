import axios from "axios";

const state={

    dealers:[],
    dealer:{},
    dealerType:[

        {
            id:3,
            name:'Kullanıcı',
        },
        {
            id:4,
            name:'psikolog',
        }
    ],
};
const getters={
    dealers(state){

        return state.dealers
    },

    dealer(state){

        return state.dealer
    },
    dealerType(state){

        return state.dealerType
    }

};
const mutations={
    initDealers(state, dealer){
        state.dealers=dealer;
    },

    initDealer(state, dealer){
        state.dealer=dealer;
    },

    addDealer(state, dealer){
        state.dealers.push(dealer);
    },

    updateDealer(state, dealer){

        let index=state.dealers.findIndex(c=> c.id==dealer.id);

        if(index>-1){
            state.dealers[index]=dealer;
        }
    },
    deleteDealer(state, dealerID){
        let index=state.dealers.findIndex(c=> c.id==dealerID)
        if(index>-1){
            state.dealers.splice(index, 1)
        }
    }
};
const  actions={
    initDealers(context){
        axios.get('/backend/dealers').then(response=> {
            context.commit('initDealers', response.data.model)
        })
    },
    initUserType(context, type){
        axios.get('/backend/users/'+type).then(response=> {
            context.commit('initDealers', response.data.model)
        })
    },
    initUsers(context){
        axios.get('/backend/users/').then(response=> {
            context.commit('initDealers', response.data.model)
        })
    },
    initDealer(context, dealerId){
        axios.get('/backend/dealer/'+dealerId).then(response=> {
            context.commit('initDealer', response.data.model)
        })
    },

    addUser(context, dealer){

        axios.post("/backend/user", dealer).then(response=> {


            if(response.data.type=="success") {
                context.commit('addDealer', {id: response.data.id, ...dealer});
            }
            swal({
                position: 'center',
                type: response.data.type,
                title: response.data.title,
                text: response.data.message,
                showConfirmButton: false,
                timer: 1500
            });
        })
    },
    addDealer(context, dealer){

        axios.post("/backend/dealer", dealer).then(response=> {


            if(response.data.type=="success") {
                context.commit('addDealer', {id: response.data.id, ...dealer});
            }
            swal({
                position: 'center',
                type: response.data.type,
                title: response.data.title,
                text: response.data.message,
                showConfirmButton: false,
                timer: 1500
            });
        })
    },

    updateDealer(context, dealer){
        axios.put('/backend/dealer/'+dealer.id, dealer).then(response=> {
            if(response.data.type=="success") {

                context.commit('updateDealer', dealer);
            }

            swal({
                position: 'center',
                type: response.data.type,
                title: response.data.title,
                text: response.data.message,
                showConfirmButton: false,
                timer: 1500
            });

        })

    },
    dealerIsActiveSetter(context, dealer){

        axios.put("/backend/dealer/isActiveSetter/"+dealer.id+"/", dealer).then(response=> {

            swal({
                position: 'center',
                type: response.data.type,
                title: response.data.title,
                text: response.data.message,
                showConfirmButton: false,
                timer: 1500
            });


        })
    },
    deleteDealer(context, dealerID){

        swal({

            title: "SİLME İŞLEMİ",
            text: "<b>Silmek İstediğinizden Eminmisiniz!?</b>",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Kabul Ediyorum",
        }).then((result) => {
            if (result.value) {
                axios.delete('/backend/dealer/'+ dealerID).then(response=> {
                    if(response.data.type=="success") {
                        context.commit('deleteDealer', dealerID)
                    }

                    swal({
                        position: 'center',
                        type: response.data.type,
                        title: response.data.title,
                        text: response.data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });

                })
            }
        })


    }

};

export default {

    state,
    mutations,
    actions,
    getters

}
