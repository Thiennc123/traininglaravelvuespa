import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
    users: [],
    user:{},
}

// getters
export const getters = {
    tobin: state => {
        return state.users;
    }
}

// mutations
export const mutations = {
    [types.SET_USERS](state, dataUsers) {
        state.users = dataUsers.data;
    },
    [types.SET_USER](state, dataUsers) {
        state.user = dataUsers;
    },
}

// actions
export const actions = {
    getUsers({ commit }) {
        axios.get('http://laravelvue.example.com/api/users')
            .then(response => {
                commit(types.SET_USERS, response.data);
            })
    },
    addUsers({commit}, data){
        axios.post('http://laravelvue.example.com/api/users',data);
    },
    getUser({commit}, data){
        axios.get('http://laravelvue.example.com/api/users/' + data + '/edit')
        .then(response => {
            commit(types.SET_USER, response.data);
        })
    },
    updateUser({commit}, data){
        axios.put('http://laravelvue.example.com/api/users/' + data.id, data);
    },
    deleteUser({ commit }, data) {
        axios.delete('http://laravelvue.example.com/api/users/' + data);
    },
}
