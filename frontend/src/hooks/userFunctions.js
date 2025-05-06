import httpClient from "@/services/http.service";
import {onMounted, ref} from "vue";
import { useUserStore } from "@/stores/userStore"

export function userFunction(form) {
    const user = ref({})
    const users = ref([])
    let userStore = useUserStore();
    async function getUsers() {
        const {status, data} = await httpClient.get('/user/get-users');
        if (status === 200) {
            users.value = data;
            userStore.setUsers(users.value);
        }
    }

    async function getCurrentUser() {
        if (user.value) {
            const {status, data} = await httpClient.get('/user/data');
            if (status === 200) {
                user.value = data;
                userStore.setCurrentUser(user.value);
            }
        }
    }

    onMounted(getUsers(), getCurrentUser());
    return {users, user};
}