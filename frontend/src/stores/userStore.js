import { defineStore } from 'pinia';

export const useUserStore = defineStore('user', {
    state: () => ({
        users: [],
        currentUser: {},
    }),

    actions: {
        setUsers(users) {
            this.users = users;
        },
        setCurrentUser(user) {
            this.currentUser = user;
        },
    },
});