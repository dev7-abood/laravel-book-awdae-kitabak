import axios from 'axios'

const state = {
    number_books_d : []
};

const getters = {};

const actions = {
   async numberOfBooks({state} ,route){
      const res = await axios.get(`/number-of-books/${route}`);
      state.number_books_d
    }
};

const mutations = {
    // SET_NUMBER_OF_BOOKS : (state , number_of_books) => (state.number_books = number_of_books)
};

export default {
    state,getters,actions,mutations
}
