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

    const taskErrors = ref({});

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

    const validateTask = () => {
        taskErrors.value = {};
        let isValidTask = true;
        if (task.value.name.length < 3) {
            isValidTask = false;
            taskErrors.value.name = ['Debe tener al menos 3 caracteres'];
        } 

        if (Array.isArray(task.value.categories) && task.value.categories.length <= 0) {
            isValidTask = false;
            taskErrors.value.categories = ['Debe seleccionar al menos una categoría'];
        }

        return isValidTask;
    };

    const storeTask = async () => {
        if (!validateTask()) {
            return;
        }

        dispatchLoadingEmit(true);

        taskErrors.value = '';
        try {
            const response = await axios.post('/api/tasks', task.value);
            await clearTask();
            await getTasks();
            toast.success(response.data.message);
        } catch (e) {
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
            toast.success(response.data.message);
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