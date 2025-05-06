import {ref} from "vue";
import authService from "@/services/auth.service";
import router from "@/router/router";

export function userAuthorization(form){
    const errors = ref([])
    const formData = ref(form)
    async function login() {
        const { success, errors: loginErrors } = await authService.login(formData.value);
        if (success) {
            router.push({ name: 'home' });
        } else {
            errors.value = loginErrors;
        }
    }

    const registration = async () => {
        const { success, errors: registrationErrors } = await authService.register(formData.value);
        if (success) {
            router.push({ name: 'home' });
        } else {
            errors.value = registrationErrors;
        }
    };

    return {login, registration, errors}
}