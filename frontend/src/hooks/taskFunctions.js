import httpClient from "@/services/http.service";
import {onMounted, ref} from "vue";

export function taskListFunctions() {
    const tasks = ref([])
    const transferNoteToUser = async (currentUserID, taskId, newUserId, accessToken) => {
        try {
            const response = await httpClient.put(
                `user/change-user-executor/${currentUserID}/${taskId}/${newUserId}`,
                {},
                // {
                //   headers: {
                //     Authorization: `Bearer ${accessToken}`,
                //   },
                // }
            );

            if (response.status === 200) {
                console.log('Task user changed successfully');
            }
        } catch (error) {
            console.error('Error changing task user:', error);
        }
    };

    const deleteTask = async task => {
        const { status } = await httpClient.delete(`task/${task.value.task.id}`, {});
        if (status === 204) {
            tasks.value.splice(tasks.value.indexOf(task), 1);
        }
    };

    const addTask = async () => {
        const { status, data } = await httpClient.post('task', {});
        if (status === 201) {
            tasks.value.unshift(data);
        }
    };

    const noteUpdated = async task => {
        const { status } = await httpClient.put(`task/${task.value.task.id}`, task);
    };

    const fetchTasks = async () => {
        const { status, data } = await httpClient.get('task');
        if (status === 200) {
            tasks.value = data;
        }
    };

    onMounted(fetchTasks);

    return {
        tasks,
        deleteTask,
        addTask,
        noteUpdated,
        transferNoteToUser
    };
}