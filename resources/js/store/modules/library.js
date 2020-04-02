import axios from 'axios'

const state = {
    librarys : {},
};

const getters = {

};

const actions = {
    getLibrary({commit} , libraryId , process_finish){
        axios.get(`/library/${libraryId}`)
            .then(res => {
                commit('SET_LIBRARY' , res.data);
            }).then(res => process_finish)
    }
};

const mutations = {
    SET_LIBRARY(state , library){
        state.librarys = {};
        state.librarys = library
    },
};

export default {
    state,getters,actions,mutations
};
