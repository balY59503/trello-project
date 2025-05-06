import { defineStore } from 'pinia';

export const useStore = defineStore('store', {
    state: () => ({
        showNavBar: true
    }),
    actions: {
        toggleNavBar() {
            this.showNavBar = !this.showNavBar;
        }
    }
});