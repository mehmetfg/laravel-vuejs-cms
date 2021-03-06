import axios from "axios";

const state={

    clients:[],
    client:{},
    appointmenClient:{}

};
const getters={
    clients(state){

        return state.clients
    },

    client(state){

        return state.client
    },
    appointmenClient(){

        return state.appointmenClient
    }

};
const mutations={
    initClients(state, client){
        state.clients=client;
    },

    initClient(state, client){
        state.client=client;
    },
    initAppointmentClient(state, client){

      state.appointmenClient=client
    },
    addClient(state, client){
        state.clients.push(client);
    },
    updateClient(state, client){

        let index=state.clients.findIndex(c=> c.id==client.id);

        if(index>-1){
            state.clients[index]=client;
        }
    },
    deleteClient(state, clientID){
        let index=state.clients.findIndex(c=> c.id==clientID)
        if(index>-1){
            state.clients.splice(index, 1)
        }
    }
};
const  actions={
    initClients(context){
        axios.get('/backend/clients').then(response=> {
            context.commit('initClients', response.data.model)
        })
    },
    initClient(context, clientId){
        axios.get('/backend/client/'+clientId).then(response=> {
            context.commit('initClient', response.data.model)

        })
    },

    initAppointmentClient(context, clientName){
        axios.get('/backend/client/name/'+clientName).then(response=>{

            context.commit('initAppointmentClient', response.data.model)

            if(response.data.error==0){

                swal({
                    position: 'center',
                    type: 'success',
                    title: response.data.model.name,
                    text: 'Danışan Kaydı Bulunmuştur.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{


                swal({
                    position: 'center',
                    type: 'error',
                    title: 'Bulunamadı.',
                    text: 'Danışan Kaydı Bulunamamıştır.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    },
    addClient(context, client){

        axios.post("/backend/client", client).then(response=> {


            if(response.data.type=="success") {
                context.commit('addClient', {id: response.data.id, ...client});
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

    updateClient(context, client){
        axios.put('/backend/client/'+client.id, client).then(response=> {
            if(response.data.type=="success") {

                context.commit('updateClient', client);
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
    isActiveSetter(context, client){

        axios.put("/backend/client/isActiveSetter/"+client.id, client).then(response=> {

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
    deleteClient(context, clientID){

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
                axios.delete('/backend/client/'+ clientID).then(response=> {
                    if(response.data.type=="success") {
                        context.commit('deleteClient', clientID)
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
