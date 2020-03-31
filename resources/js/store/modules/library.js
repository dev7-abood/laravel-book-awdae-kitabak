// import axios from 'axios'

const state = {
    librarys : [],
};

const getters = {

};

const actions = {
    getLibrary({commit} , libraryId){
        axios.get(`/library/${libraryId}`)
            .then(res => {
                commit('SET_LIBRARY' , res.data);
            })
    }
};

const mutations = {
    SET_LIBRARY(state , library){
        state.librarys = library
    },
};

export default {
    state,getters,actions,mutations
};
