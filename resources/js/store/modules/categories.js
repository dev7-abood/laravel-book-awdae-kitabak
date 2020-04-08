import axios from 'axios'

const state = {
    listOfCategories : {}
};


const actions = {
    getCategories({commit} , categoryId ,progress_finish){
        axios.get(`/all-category?page=${categoryId}`)
            .then(res => {
                commit('SET_ALL_CATEGORIES',res.data);
                progress_finish
            })
    }
};

const mutations = {
    SET_ALL_CATEGORIES(state , category){
        state.listOfCategories = category
    }
};

const getters = {

};

export default {
    state,getters,actions,mutations
};
