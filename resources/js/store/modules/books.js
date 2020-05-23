import axios from 'axios'

const state = {
    numberOfAvailableBooks : {},
    numberOfNotAvailableBooks : {},
    books : {}
};

const getters = {

};

const actions = {
    numberOfAvailableBooks({commit}){
        axios.get(`/number-of-available-books-from-library`)
            .then(res => {
                commit('SET_NUMBER_OF_AVAILABLE_BOOKS' , res.data)})
    },
    numberOfNotAvailableBooks({commit}){
        axios.get(`/number-of-not-available-books-from-library`)
            .then(res => {
                commit('SET_NUMBER_OF_NOT_AVAILABLE_BOOKS' , res.data)})
    },
    getBooks({commit} , bookId){
        axios.get(`/getBooks/${bookId}`)
            .then(res => {
                commit('SET_BOOKS' , res.data)
            })
    }
};

const mutations = {
    SET_NUMBER_OF_AVAILABLE_BOOKS(state , number_of_books){
        state.numberOfAvailableBooks = number_of_books
    },
    SET_NUMBER_OF_NOT_AVAILABLE_BOOKS(state , number_of_books){
        state.numberOfNotAvailableBooks = number_of_books
    },
    SET_BOOKS(state , books) {
        state.books = books
    }
};

export default {
    state,getters,actions,mutations
};
