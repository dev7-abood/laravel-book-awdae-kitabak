import axios from 'axios'

const state = {
    listOfCategories : {},
    numberOfCategory : {}
};


const actions = {
    getCategories({commit} , categoryId ,progress_finish){
        axios.get(`/all-category?page=${categoryId}`)
            .then(res => {
                commit('SET_ALL_CATEGORIES',res.data);
                progress_finish
            })
    },
    getAllNumberOfAllCategory({commit})
    {
        axios.get(`/total-number-of-all-category`)
            .then(res => commit('SET_ALL_NUMBER_OF_CATEGORY' , res.data))
    }
};

const mutations = {
    SET_ALL_CATEGORIES(state , category){
        state.listOfCategories = category
    },
    SET_ALL_NUMBER_OF_CATEGORY(state , number_of_cat)
    {
        state.numberOfCategory = number_of_cat
    }
};

const getters = {

};

export default {
    state,getters,actions,mutations
};
