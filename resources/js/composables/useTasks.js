import { ref } from 'vue';
import axios from 'axios';
import useLoadingEmit  from '@/composables/useLoadingEmit';
import useAlert  from '@/composables/useAlert';
import { useToast } from "vue-toastification";

export default function useTasks() {
    const emptyTask = {
        id: null,
        name: '',
        categories: [],
    }
    const task  = ref({...emptyTask});
    const tasks = ref([]);

    const taskErrors = ref('');

    const { dispatchLoadingEmit } = useLoadingEmit();
    const { dialog } = useAlert();
    const toast = useToast();

    const getTasks = async () => {
        dispatchLoadingEmit(true);

        try {
            const response = await axios.get('/api/tasks');
            tasks.value    = await response.data.data;
        } catch (e) {
            toast.error(e.response.data.message);
        } finally {
            dispatchLoadingEmit(false);
        }
    }

    const storeTask = async () => {
        dispatchLoadingEmit(true);

        taskErrors.value = '';
        try {
            const response = await axios.post('/api/tasks', task.value);
            await clearTask();
            await getTasks();
            toast.success(response.data.message);
        } catch (e) {
            console.log(e);
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    taskErrors.value = e.response.data.errors;
                }
            } else {
                toast.error(e.response.data.message);
            }
        } finally {
            dispatchLoadingEmit(false);
        }
    }

    const removeTask = async (taskId) => {
        let task = tasks.value.find(({ id }) => {
            return id === taskId;
        }); 

        const userResponse = await dialog(`¿Está seguro de eliminar la tarea ${task.name}?`);

        if (!userResponse) return;
           
        dispatchLoadingEmit(true);
        taskErrors.value = '';

        try {
            const response = await axios.delete(`/api/tasks/${taskId}`);
            getTasks();
        } catch (e) {
            debugger;
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    taskErrors.value = e.response.data.errors;
                }
            } else{
                toast.error(e.response.data.message);
            }
        } finally {
            dispatchLoadingEmit(false);
        }
    }

    const clearTask = async () => {
        task.value = {...emptyTask};
    };

    return {
        task,
        tasks,
        taskErrors,
        getTasks,
        storeTask,
        removeTask
    }
}