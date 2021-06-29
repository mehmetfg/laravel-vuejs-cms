import axios from "axios";

const state={

    forms:[],
    form:{
        field9:[]
    },

};
const getters={
    forms(state){

        return state.forms
    },

    form(state){

        return state.form
    },

};
const mutations={
    initForms(state, form){
        state.forms=form;
    },

    initForm(state, form){
        state.form=form;
    },

    addForm(state, form){
        state.forms.push(form);
    },
    updateForm(state, form){

        let index=state.forms.findIndex(c=> c.id==form.id);

        if(index>-1){
            state.forms[index]=form;
        }
    },
    deleteForm(state, formID){
        let index=state.forms.findIndex(c=> c.id==formID)
        if(index>-1){
            state.forms.splice(index, 1)
        }
    }
};
const  actions={
    initForms(context, payload){
        axios.get('/backend/forms/'+payload).then(response=> {
            context.commit('initForms', response.data.model)
        })
    },
    initForm(context, payload){
        axios.get('/backend/form/'+payload.id+'/'+payload.type).then(response=> {
            context.commit('initForm', response.data.model)
        })
    },

    initFormWithClient(context, payload){
        axios.get('/backend/forms/client/'+payload).then(response=> {
            context.commit('initForms', response.data.model)
        })
    },
    addForm(context, form){

        axios.post("/backend/form", form).then(response=> {


            if(response.data.type=="success") {
                context.commit('addForm', {id: response.data.id, ...form});
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

    updateForm(context, form){
        axios.put('/backend/form/'+form.id, form).then(response=> {
            if(response.data.type=="success") {

                context.commit('updateForm', form);
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
    isActiveSetter(context, form){

        axios.put("/backend/form/isActiveSetter/"+form.id, form).then(response=> {

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
    deleteForm(context, formID){

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
                axios.delete('/backend/form/'+ formID).then(response=> {
                    if(response.data.type=="success") {
                        context.commit('deleteForm', formID)
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
